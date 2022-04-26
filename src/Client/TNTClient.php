<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNTExpress\Client;

use TNTExpress\Exception\{ ClientException, ExceptionManagerInterface, InvalidPairZipcodeCityException, MissingFieldException, NoServiceAvailableException, ParcelNotFoundException };
use TNTExpress\Model\{ DropOffPoint, City, ExpeditionRequest, Expedition };
use SoapClient;
use SoapFault;
use Closure;
class TNTClient implements TNTClientInterface
{
    protected readonly SoapClient $client;

    protected readonly ExceptionManagerInterface $manager;

    public function __construct(SoapClient $client, ExceptionManagerInterface $manager)
    {
        $this->client  = $client;
        $this->manager = $manager;
    }

    public function checkZipcodeCityMatch(string $zipCode, string $city = '') : bool
    {
        try
        {
            $this->getDropOffPoints($zipCode, $city);
        }
        catch (ClientException $e)
        {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getDropOffPoints(string $zipCode, string $city = '') : array
    {
        if ('' === $city)
        {
            /** @var \TNTExpress\Model\City */
            $cityElement = current($this->getCitiesGuide($zipCode));
            $city = $cityElement->getName();
        }

        try
        {
            $dropOffPoints = $this->client->dropOffPoints(['zipCode' => $zipCode, 'city' => $city]);
        }
        catch (SoapFault $e)
        {
            $this->manager->handle($e);
        }

        if (!isset($dropOffPoints->DropOffPoint))
        {
            throw new InvalidPairZipcodeCityException($zipCode, $city);
        }

        foreach ($dropOffPoints->DropOffPoint as $point)
        {
            $point->init();
        }

        return $dropOffPoints->DropOffPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function getCitiesGuide(string $zipCode) : array
    {
        try
        {
            $cities = $this->client->CitiesGuide(['zipCode' => $zipCode]);
        }
        catch (SoapFault $e)
        {
            $this->manager->handle($e);
        }

        if (!isset($cities->City))
        {
            throw new ClientException(sprintf('Zip code "%s" does not match any city.', $zipCode));
        }

        $cities = $cities->City;

        if (!is_array($cities))
        {
            $cities = [$cities];
        }

        foreach ($cities as $city)
        {
            $city->init();
        }

        return $cities;
    }

    /**
     * {@inheritdoc}
     */
    public function createExpedition(ExpeditionRequest $expeditionRequest) : Expedition
    {
        $this->ensureParameters($expeditionRequest, ['shippingDate', 'accountNumber', 'sender', 'receiver', 'serviceCode', 'quantity', 'parcelsRequest', 'labelFormat']);

        try {
            $result = $this->client->expeditionCreation(['parameters' => $expeditionRequest->toArray()]);
        } catch (SoapFault $e) {
            $this->manager->handle($e);
        }

        if (!isset($result->Expedition)) {
            throw new ClientException('No Expedition in results.');
        }

        $expedition = $result->Expedition;
        $expedition->init();

        return $expedition;
    }

    /**
     * {@inheritdoc}
     */
    public function getFeasibility(ExpeditionRequest $expeditionRequest, ?Closure $filter = null) : array
    {
        $this->ensureParameters($expeditionRequest, ['shippingDate', 'accountNumber', 'sender', 'receiver']);

        try
        {
            $result = $this->client->feasibility(['parameters' => $expeditionRequest->toArray()]);
        }
        catch (SoapFault $e)
        {
            $this->manager->handle($e);
        }

        if (!isset($result->Service))
        {
            throw new NoServiceAvailableException();
        }

        $services = $result->Service;

        if (!is_array($services))
        {
            $services = [$services];
        }

        foreach ($services as $service)
        {
            $service->init();
        }

        if (is_callable($filter))
        {
            $services = array_values(array_filter($services, $filter));
        }

        if (0 === count($services))
        {
            throw new NoServiceAvailableException();
        }

        return $services;
    }

    /**
     * {@inheritdoc}
     */
    public function getTrackingByConsignment(string $trackingNumber) : mixed
    {
        try
        {
            $result = $this->client->trackingByConsignment(['parcelNumber' => $trackingNumber]);
        }
        catch (SoapFault $e)
        {
            $this->manager->handle($e);
        }

        if (!isset($result->Parcel))
        {
            throw new ParcelNotFoundException($trackingNumber);
        }

        $parcel = $result->Parcel;
        $parcel->init();

        return $parcel;
    }

    /**
     * @param string[] $requiredParameters
     * @throws ClientException
     */
    protected function ensureParameters(ExpeditionRequest $expeditionRequest, array $requiredParameters) : void
    {
        $diff = array_diff($requiredParameters, array_keys($expeditionRequest->toArray(true)));

        if (0 < count($diff))
        {
            throw new MissingFieldException(implode(', ', $diff));
        }
    }
}
