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

class DropOffPoint extends FullAddressPlusInfo
{
    protected string $latitude = '';
    protected string $longitude = '';
    protected string $xETTCode = '';

    public function init() : void
    {
    }

    public function getLatitude() : string
    {
        return $this->latitude;
    }

    public function getLongitude() : string
    {
        return $this->longitude;
    }

    public function getXETTCode() : string
    {
        return $this->xETTCode;
    }
}
