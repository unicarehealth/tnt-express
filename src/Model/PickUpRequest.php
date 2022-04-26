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

class PickUpRequest
{
    /**
     * Mandatory
     * @var string Format HH:MM
     */
    protected string $closingTime = '';

    protected string $emailAddress = '';

    /**
     * First name of the contact
     */
    protected string $firstName = '';

    protected string $instructions = '';

    /**
     * Last name of the contact
     */
    protected string $lastName = '';

    /**
     * Type of media for notifications, only EMAIL accepted
     */
    protected string $media = 'EMAIL';

    /**
     * String version for boolean: do we notify or not
     */
    protected string $notifySuccess = '';

    /**
     * Phone number of the contact - mandatory
     */
    protected string $phoneNumber = '';

    /**
     * Service of the contact
     */
    protected ?Service $service = null;

    public function __construct(string $phoneNumber = '', string $emailAddress = '', string $closingTime = '')
    {
        $this->setPhoneNumber($phoneNumber);
        $this->setEmailAddress($emailAddress);
        $this->setClosingTime($closingTime);
    }

    public function getClosingTime() : string
    {
        return $this->closingTime;
    }

    /**
     * @return $this
     */
    public function setClosingTime(string $closingTime) : static
    {
        $this->closingTime = $closingTime;
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

    public function getFirstName() : string
    {
        return $this->firstName;
    }

    /**
     * @return $this
     */
    public function setFirstName(string $firstName) : static
    {
        $this->firstName = $firstName;
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

    public function getLastName() : string
    {
        return $this->lastName;
    }

    /**
     * @return $this
     */
    public function setLastName(string $lastName) : static
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getMedia() : string
    {
        return $this->media;
    }

    public function getNotifySuccess() : string
    {
        return $this->notifySuccess;
    }

    /**
     * @return $this
     */
    public function setNotifySuccess(string $notifySuccess) : static
    {
        $this->notifySuccess = $notifySuccess;
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
}
