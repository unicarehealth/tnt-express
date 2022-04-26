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

class Events
{
    /** @var string[] */
    static public $sequence = [
        'requestDate',
        'processDate',
        'arrivalDate',
        'deliveryDepartureDate',
        'deliveryDate',
    ];

    protected ?Datetime $requestDate = null;

    protected ?Datetime $processDate = null;

    protected string $processCenter = '';

    protected string $processCenterPEX = '';

    protected ?DateTime $arrivalDate = null;

    protected string $arrivalCenter = '';

    protected string $arrivalCenterPEX = '';

    protected ?Datetime $deliveryDepartureDate = null;

    protected string $deliveryDepartureCenter = '';

    protected string $deliveryDepartureCenterPEX = '';

    protected ?DateTime $deliveryDate = null;

    protected string $shortStatus = '';

    protected string $primaryPODUrl = '';

    protected string $secondaryPODUrl = '';

    public function init() : void
    {
        foreach (['requestDate', 'processDate', 'arrivalDate', 'deliveryDepartureDate', 'deliveryDate'] as $attr)
        {
            $this->$attr = $this->$attr ? new Datetime($this->$attr) : null;
        }
    }

    /**
     * Return the last non-null event.
     */
    public function getLastEvent() : string
    {
        if (null === $this->{self::$sequence[0]}) {
            return self::$sequence[0];
        }

        foreach (self::$sequence as $i => $event) {
            if (null === $this->$event) {
                return self::$sequence[$i-1];
            }
        }

        return self::$sequence[count(self::$sequence)-1];
    }

    public function isEventDone(string $event) : bool
    {
        return (isset($this->$event) && null !== $this->$event);
    }

    public function getRequestDate() : ?DateTime
    {
        return $this->requestDate;
    }

    /**
     * @return $this
     */
    public function setRequestDate(?DateTime $requestDate) : static
    {
        $this->requestDate = $requestDate;
        return $this;
    }

    public function getProcessDate() : ?DateTime
    {
        return $this->processDate;
    }

    /**
     * @return $this
     */
    public function setProcessDate(?DateTime $processDate) : static
    {
        $this->processDate = $processDate;
        return $this;
    }

    public function getProcessCenter() : string
    {
        return $this->processCenter;
    }

    /**
     * @return $this
     */
    public function setProcessCenter(string $processCenter) : static
    {
        $this->processCenter = $processCenter;
        return $this;
    }

    public function getProcessCenterPEX() : string
    {
        return $this->processCenterPEX;
    }

    /**
     * @return $this
     */
    public function setProcessCenterPEX(string $processCenterPEX) : static
    {
        $this->processCenterPEX = $processCenterPEX;
        return $this;
    }

    public function getArrivalDate() : ?DateTime
    {
        return $this->arrivalDate;
    }

    /**
     * @return $this
     */
    public function setArrivalDate(?DateTime $arrivalDate) : static
    {
        $this->arrivalDate = $arrivalDate;
        return $this;
    }

    public function getArrivalCenter() : string
    {
        return $this->arrivalCenter;
    }

    /**
     * @return $this
     */
    public function setArrivalCenter(string $arrivalCenter) : static
    {
        $this->arrivalCenter = $arrivalCenter;
        return $this;
    }

    public function getArrivalCenterPEX() : string
    {
        return $this->arrivalCenterPEX;
    }

    /**
     * @return $this
     */
    public function setArrivalCenterPEX(string $arrivalCenterPEX) : static
    {
        $this->arrivalCenterPEX = $arrivalCenterPEX;
        return $this;
    }

    public function getDeliveryDepartureDate() : ?DateTime
    {
        return $this->deliveryDepartureDate;
    }

    /**
     * @return $this
     */
    public function setDeliveryDepartureDate(?DateTime $deliveryDepartureDate) : static
    {
        $this->deliveryDepartureDate = $deliveryDepartureDate;
        return $this;
    }

    public function getDeliveryDepartureCenter() : string
    {
        return $this->deliveryDepartureCenter;
    }

    /**
     * @return $this
     */
    public function setDeliveryDepartureCenter(string $deliveryDepartureCenter) : static
    {
        $this->deliveryDepartureCenter = $deliveryDepartureCenter;
        return $this;
    }

    public function getDeliveryDepartureCenterPEX() : string
    {
        return $this->deliveryDepartureCenterPEX;
    }

    /**
     * @return $this
     */
    public function setDeliveryDepartureCenterPEX(string $deliveryDepartureCenterPEX) : static
    {
        $this->deliveryDepartureCenterPEX = $deliveryDepartureCenterPEX;
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

    public function getDeliveryDate() : ?DateTime
    {
        return $this->deliveryDate;
    }

    /**
     * @return $this
     */
    public function setDeliveryDate(?DateTime $deliveryDate) : static
    {
        $this->deliveryDate = $deliveryDate;
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
