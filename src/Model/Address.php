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

class Address
{
    protected int $id = 0;

    protected string $address1 = '';
    
    protected string $address2 = '';
    
    protected string $city = '';
    
    protected string $zipCode = '';

    public function init() : void
    {
    }
    
    public function getAddress1() : string
    {
        return $this->address1;
    }

    /**
     * @return $this
     */
    public function setAddress1(string $address1) : static
    {
        $this->address1 = $address1;
        return $this;
    }
    
    public function getAddress2() : string
    {
        return $this->address2;
    }

    /**
     * @return $this
     */
    public function setAddress2(string $address2) : static
    {
        $this->address2 = $address2;
        return $this;
    }

    public function getCity() : string 
    {
        return $this->city;
    }

    /**
     * @return $this
     */
    public function setCity(string $city) : static
    {
        $this->city = $city;
        return $this;
    }

    public function getZipCode() : string
    {
        return $this->zipCode;
    }

    /**
     * @return $this
     */
    public function setZipCode(string $zipCode) : static
    {
        $this->zipCode = $zipCode;
        return $this;
    }
}
