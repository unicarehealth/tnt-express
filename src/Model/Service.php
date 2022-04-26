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

class Service
{
    protected string $dueDate = '';

    protected string $serviceCode = '';

    protected string $serviceLabel = '';

    protected bool $saturdayDelivery = false;

    protected bool $priorityGuarantee = false;

    protected bool $insurance = false;

    protected bool $afternoonDelivery = false;

    public function init() : void
    {
        foreach (['saturdayDelivery', 'priorityGuarantee', 'insurance', 'afternoonDelivery'] as $key) {
            $this->$key = (bool)$key;
        }
    }

    public function getDueDate() : string
    {
        return $this->dueDate;
    }

    /**
     * @return $this
     */
    public function setDueDate(string $dueDate) : static
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function getServiceCode(?int $nbChar = null) : string
    {
        if (null !== $nbChar) {
            return substr($this->serviceCode, 0, $nbChar);
        }

        return $this->serviceCode;
    }

    /**
     * @return $this
     */
    public function setServiceCode(string $serviceCode) : static
    {
        $this->serviceCode = $serviceCode;
        return $this;
    }

    public function getServiceLabel() : string
    {
        return $this->serviceLabel;
    }

    /**
     * @return $this
     */
    public function setServiceLabel(string $serviceLabel) : static
    {
        $this->serviceLabel = $serviceLabel;
        return $this;
    }

    public function isSaturdayDelivery() : bool
    {
        return $this->saturdayDelivery;
    }

    /**
     * @return $this
     */
    public function setSaturdayDelivery(bool $saturdayDelivery) : static
    {
        $this->saturdayDelivery = (bool) $saturdayDelivery;
        return $this;
    }

    public function isPriorityGuarantee() : bool
    {
        return $this->priorityGuarantee;
    }

    /**
     * @return $this
     */
    public function setPriorityGuarantee(bool $priorityGuarantee) : static
    {
        $this->priorityGuarantee = $priorityGuarantee;
        return $this;
    }

    public function isInsurance() : bool
    {
        return $this->insurance;
    }

    /**
     * @return $this
     */
    public function setInsurance(bool $insurance) : static
    {
        $this->insurance = (bool) $insurance;
        return $this;
    }

    public function isAfternoonDelivery() : bool
    {
        return $this->afternoonDelivery;
    }

    /**
     * @return $this
     */
    public function setAfternoonDelivery(bool $afternoonDelivery) : static
    {
        $this->afternoonDelivery = $afternoonDelivery;
        return $this;
    }
}
