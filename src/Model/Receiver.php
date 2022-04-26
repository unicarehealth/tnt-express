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

class Receiver extends Address
{
    /**
     * Company name
     */
    protected string $name = '';

    protected string $phoneNumber = '';

    protected string $contactFirstName = '';

    protected string $contactLastName = '';

    protected string $emailAddress = '';

    protected string $faxNumber = '';

    protected string $type = 'ENTERPRISE';

    /**
     * Only if type == DEPOT, then the PEX code
     */
    protected string $typeId = '';

    protected string $instructions = '';

    protected string $accessCode = '';

    protected string $floorNumber = '';

    protected string $buildingId = '';

    protected string $sendNotification = '';

    /**
     * @return string[]
     */
    static public function getTypes() : array
    {
        return ['ENTERPRISE', 'DEPOT', 'DROPOFFPOINT', 'INDIVIDUAL'];
    }

    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName(string $name) : static
    {
        $this->name = $name;
        return $this;
    }

    public function getPhoneNumber() : string
    {
        return $this->phoneNumber;
    }

    /**
     * @return $this
     */
    public function setPhoneNumber(string $phoneNumber) : static
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getContactFirstName() : string
    {
        return $this->contactFirstName;
    }

    /**
     * @return $this
     */
    public function setContactFirstName(string $contactFirstName) : static
    {
        $this->contactFirstName = $contactFirstName;
        return $this;
    }

    public function getContactLastName() : string
    {
        return $this->contactLastName;
    }

    /**
     * @return $this
     */
    public function setContactLastName(string $contactLastName) : static
    {
        $this->contactLastName = $contactLastName;
        return $this;
    }

    public function getEmailAddress() : string
    {
        return $this->emailAddress;
    }

    /**
     * @return $this
     */
    public function setEmailAddress(string $emailAddress) : static
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    public function getFaxNumber() : string
    {
        return $this->faxNumber;
    }

    /**
     * @return $this
     */
    public function setFaxNumber(string $faxNumber) : static
    {
        $this->faxNumber = $faxNumber;
        return $this;
    }

    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @return $this
     */
    public function setType(string $type) : static
    {
        $this->type = $type;
        return $this;
    }

    public function getTypeId() : string
    {
        return $this->typeId;
    }

    /**
     * @return $this
     */
    public function setTypeId(string $typeId) : static
    {
        $this->typeId = $typeId;
        return $this;
    }

    public function getInstructions() : string
    {
        return $this->instructions;
    }

    /**
     * @return $this
     */
    public function setInstructions(string $instructions) : static
    {
        $this->instructions = $instructions;
        return $this;
    }
}
