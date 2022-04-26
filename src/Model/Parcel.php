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

class Parcel
{
    protected string $consignmentNumber = '';

    /**
     * @var numeric-string
     */
    protected string $accountNumber = '0';

    protected string $reference = '';

    protected ?Sender $sender = null;

    protected ?Receiver $receiver = null;

    protected ?DropOffPoint $dropOffPoint = null;

    protected ?Service $service = null;

    protected string $weight = '';

    protected ?Events $events = null;

    protected string $statusCode = '';

    protected string $longStatus = '';

    protected string $shortStatus = '';

    protected string $primaryPODUrl = '';

    protected string $secondaryPODUrl = '';

    public function init() : void
    {
        $this->events?->init();
    }

    public function getConsignmentNumber() : string
    {
        return $this->consignmentNumber;
    }

    /**
     * @return $this
     */
    public function setConsignmentNumber(string $consignmentNumber) : static
    {
        $this->consignmentNumber = $consignmentNumber;
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
     * @param numeric-string $accountNumber
     * @return $this
     */
    public function setAccountNumber(string $accountNumber) : static
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    public function getReference() : string
    {
        return $this->reference;
    }

    /**
     * @return $this
     */
    public function setReference(string $reference) : static
    {
        $this->reference = $reference;
        return $this;
    }

    public function getSender() : ?Sender
    {
        return $this->sender;
    }

    /**
     * @return $this
     */
    public function setSender(?Sender $sender) : static
    {
        $this->sender = $sender;
        return $this;
    }

    public function getReceiver() : ?Receiver
    {
        return $this->receiver;
    }

    /**
     * @return $this
     */
    public function setReceiver(?Receiver $receiver) : static
    {
        $this->receiver = $receiver;
        return $this;
    }

    public function getDropOffPoint() : ?DropOffPoint
    {
        return $this->dropOffPoint;
    }

    /**
     * @return $this
     */
    public function setDropOffPoint(?DropOffPoint $dropOffPoint) : static
    {
        $this->dropOffPoint = $dropOffPoint;
        return $this;
    }

    public function getService() : ?Service
    {
        return $this->service;
    }

    /**
     * @return $this
     */
    public function setService(?Service $service) : static
    {
        $this->service = $service;
        return $this;
    }

    public function getWeight() : string
    {
        return $this->weight;
    }

    /**
     * @return $this
     */
    public function setWeight(string $weight) : static
    {
        $this->weight = $weight;
        return $this;
    }

    public function getEvents() : ?Events
    {
        return $this->events;
    }

    /**
     * @return $this
     */
    public function setEvents(Events $events) : static
    {
        $this->events = $events;
        return $this;
    }

    public function getStatusCode() : string
    {
        return $this->statusCode;
    }

    /**
     * @return $this
     */
    public function setStatusCode(string $statusCode) : static
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getShortStatus() : string
    {
        return $this->shortStatus;
    }

    /**
     * @return $this
     */
    public function setShortStatus(string $shortStatus) : static
    {
        $this->shortStatus = $shortStatus;
        return $this;
    }

    public function getLongStatus() : string
    {
        return $this->longStatus;
    }

    public function setLongStatus(string $longStatus) : static
    {
        $this->longStatus = $longStatus;
        return $this;
    }

    public function getPrimaryPODUrl() : string
    {
        return $this->primaryPODUrl;
    }

    /**
     * @return $this
     */
    public function setPrimaryPODUrl(string $primaryPODUrl) : static
    {
        $this->primaryPODUrl = $primaryPODUrl;
        return $this;
    }

    public function getSecondaryPODUrl() : string
    {
        return $this->secondaryPODUrl;
    }

    /**
     * @return $this
     */
    public function setSecondaryPODUrl(string $secondaryPODUrl) : static
    {
        $this->secondaryPODUrl = $secondaryPODUrl;
        return $this;
    }
}
