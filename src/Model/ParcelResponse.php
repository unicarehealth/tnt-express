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

class ParcelResponse
{
    protected string $sequenceNumber = '';

    protected string $parcelNumber = '';

    protected string $trackingURL = '';

    protected string $stickerNumber = '';

    public function init() : void
    {
    }

    public function getParcelNumber() : string
    {
        return $this->parcelNumber;
    }

    /**
     * @return $this
     */
    public function setParcelNumber(string $parcelNumber) : static
    {
        $this->parcelNumber = $parcelNumber;
        return $this;
    }

    public function getTrackingURL() : string
    {
        return $this->trackingURL;
    }

    /**
     * @return $this
     */
    public function setTrackingURL(string $trackingURL) : static
    {
        $this->trackingURL = $trackingURL;
        return $this;
    }

    public function getStickerNumber() : string
    {
        return $this->stickerNumber;
    }

    /**
     * @return $this
     */
    public function setStickerNumber(string $stickerNumber) : static
    {
        $this->stickerNumber = $stickerNumber;
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
}
