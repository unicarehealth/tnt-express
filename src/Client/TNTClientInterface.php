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

use TNTExpress\Exception\ClientException;
use TNTExpress\Model\City;
use TNTExpress\Model\DropOffPoint;
use TNTExpress\Model\Expedition;
use TNTExpress\Model\ExpeditionRequest;
use TNTExpress\Model\Service;
use Closure;

interface TNTClientInterface
{
    /**
     * Return the list of drop off points matching the zip code
     *
     * @return DropOffPoint[]
     * @throws ClientException
     */
    public function getDropOffPoints(string $zipCode, string $city = '') : array;

    /**
     * Return the matching city from the given zip code
     *
     * @return City[]
     * @throws ClientException
     */
    public function getCitiesGuide(string $zipCode) : array;

    /**
     * Return a list of possible services for an expedition
     *
     * @return Service[]
     * @throws ClientException
     */
    public function getFeasibility(ExpeditionRequest $expeditionRequest, ?Closure $filter = null) : array;

    /**
     * Create an expedition with the given parameters
     *
     * @throws ClientException
     */
    public function createExpedition(ExpeditionRequest $expeditionRequest) : Expedition;

    /**
     * Get the status of a parcel given its number
     *
     */
    public function getTrackingByConsignment(string $trackingNumber) : mixed;
}
