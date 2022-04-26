<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNTExpress\Model;

use Datetime;

class ExpeditionRequest
{
    protected ?PickUpRequest $pickUpRequest = null;

    protected ?Datetime $shippingDate = null;

    /** @var numeric-string */
    protected string $accountNumber = '0';

    protected ?Sender $sender = null;

    protected ?Receiver $receiver = null;

    protected string $serviceCode = '';

    protected int $quantity = 1;

    /**
     * @var ParcelRequest[]
     */
    protected array $parcelRequests = [];

    protected bool $saturdayDelivery = false;

    /**
     * @var string[]
     */
    protected array $paybackInfo = [];

    protected string $labelFormat = 'STDA4';

    /**
     * @return array<string, string>
     */
    public function toArray(bool $filterNulls = false) : array
    {
        $ro = new \ReflectionObject($this);
        $array = [];

        foreach ($ro->getProperties() as $property)
        {
            $propertyFunctionName = 'get' . ucfirst($property->getName());
            $value = $this->$propertyFunctionName();

            if ($value instanceof Datetime)
            {
                $array[$property->getName()] = $value->format('Y-m-d');
            }
            elseif (!$filterNulls || null !== $value)
            {
                $array[$property->getName()] = $value;
            }
        }

        return $array;
    }

    /**
     * @return $this
     */
    public function setShippingDate(Datetime $shippingDate) : static
    {
        $this->shippingDate = $shippingDate;
        return $this;
    }

    public function getShippingDate() : ?DateTime
    {
        return $this->shippingDate;
    }

    /**
     * @param numeric-string $accountNumber
     * @return $this
     */
    public function setAccountNumber(string $accountNumber) : static
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @return numeric-string
     */
    public function getAccountNumber() : string
    {
        return $this->accountNumber;
    }

    /**
     * @return $this
     */
    public function setPickupRequest(?PickUpRequest $pickupRequest) : static
    {
        $this->pickUpRequest = $pickupRequest;
        return $this;
    }

    public function getPickupRequest() : ?PickUpRequest
    {
        return $this->pickUpRequest;
    }

    /**
     * @return $this
     */
    public function setSender(?Sender $sender) : static
    {
        $this->sender = $sender;
        return $this;
    }

    public function getSender() : ?Sender
    {
        return $this->sender;
    }

    /**
     * @return $this
     */
    public function setReceiver(?Receiver $receiver) : static
    {
        $this->receiver = $receiver;
        return $this;
    }

    public function getReceiver() : ?Receiver
    {
        return $this->receiver;
    }

    /**
     * @return $this
     */
    public function setServiceCode(string $serviceCode) : static
    {
        $this->serviceCode = $serviceCode;
        return $this;
    }

    public function getServiceCode() : string
    {
        return $this->serviceCode;
    }

    /**
     * @return $this
     */
    public function setQuantity(int $quantity) : static
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    /**
     * @param ParcelRequest[] $parcelRequests
     * @return $this
     */
    public function setParcelRequests(array $parcelRequests) : static
    {
        $this->parcelRequests = $parcelRequests;
        return $this;
    }

    /**
     * @return ParcelRequest[]
     */
    public function getParcelRequests() : array
    {
        return $this->parcelRequests;
    }

    /**
     * @return $this
     */
    public function setSaturdayDelivery(bool $saturdayDelivery) : static
    {
        $this->saturdayDelivery = $saturdayDelivery;

        return $this;
    }

    public function getSaturdayDelivery() : bool
    {
        return $this->saturdayDelivery;
    }

    /**
     * @param string[] $paybackInfo
     * @return $this
     */
    public function setPaybackInfo(array $paybackInfo) : static
    {
        $this->paybackInfo = $paybackInfo;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getPaybackInfo() : array
    {
        return $this->paybackInfo;
    }

    /**
     * @return $this
     */
    public function setLabelFormat(string $labelFormat) : static
    {
        $this->labelFormat = $labelFormat;
        return $this;
    }

    public function getLabelFormat() : string
    {
        return $this->labelFormat;
    }
}
