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

class ParcelRequest
{
    public string $comment = '';

    public string $customerReference = '';

    public string $insuranceAmount = '';

    public string $priorityGuarantee = '';

    public string $sequenceNumber = '';

    public string $weight = '';

    /**
     * @return string[]
     */
    static public function getPriorityGuarantees() : array
    {
        return ['', 'PTY', 'GUE'];
    }

    public function getComment() : string
    {
        return $this->comment;
    }

    /**
     * @return $this
     */
    public function setComment(string $comment) : static
    {
        $this->comment = $comment;
        return $this;
    }

    public function getCustomerReference() : string
    {
        return $this->customerReference;
    }

    /**
     * @return $this
     */
    public function setCustomerReference(string $customerReference) : static
    {
        $this->customerReference = $customerReference;
        return $this;
    }

    public function getInsuranceAmount() : string
    {
        return $this->insuranceAmount;
    }

    /**
     * @return $this
     */
    public function setInsuranceAmount(string $insuranceAmount) : static
    {
        $this->insuranceAmount = $insuranceAmount;
        return $this;
    }

    public function getPriorityGuarantee() : string
    {
        return $this->priorityGuarantee;
    }

    /**
     * @return $this
     */
    public function setPriorityGuarantee(string $priorityGuarantee) : static
    {
        $this->priorityGuarantee = $priorityGuarantee;
        return $this;
    }

    public function getSequenceNumber() : string
    {
        return $this->sequenceNumber;
    }

    /**
     * @return $this
     */
    public function setSequenceNumber(string $sequenceNumber) : static
    {
        $this->sequenceNumber = $sequenceNumber;
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
}
