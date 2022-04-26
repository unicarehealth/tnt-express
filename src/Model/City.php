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

class City
{
    protected string $name = '';

    protected string $zipCode = '';

    public function init() : void
    {
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getZipCode() : string
    {
        return $this->zipCode;
    }
}
