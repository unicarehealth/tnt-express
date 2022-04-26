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

class FullAddressPlusInfo extends FullAddress
{
    protected string $geolocalisationUrl = '';

    protected string $message = '';

    /**
     * @var string[]
     */
    protected array $openingHours = [];

    public function init() : void
    {
        parent::init();
    }

    public function getGeolocalisationUrl() : string
    {
        return $this->geolocalisationUrl;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    /**
     * @return string[]
     */
    public function getOpeningHours() : array
    {
        return json_decode((string)json_encode($this->openingHours), true);
    }
}
