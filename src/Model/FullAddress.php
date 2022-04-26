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

class FullAddress extends Address
{
    protected string $country = '';

    protected string $department = '';

    protected string $name = '';

    public function init() : void
    {
        parent::init();
    }

    public function getCountry() : string
    {
        return $this->country;
    }

    public function getDepartment() : string
    {
        return $this->department;
    }

    public function getName() : string
    {
        return $this->name;
    }
}
