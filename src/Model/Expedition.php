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

use Doctrine\Common\Collections\ArrayCollection;

class Expedition
{
    /** @var ArrayCollection<int, ParcelResponse> */
    protected ArrayCollection $parcelResponses;

    /** @var string|resource */
    protected $PDFLabels;

    protected string $pickUpNumber;

    public function __construct()
    {
        $this->parcelResponses = new ArrayCollection();
        $this->PDFLabels = '';
        $this->pickUpNumber = '';
    }

    public function init() : void
    {
        if (!$this->parcelResponses instanceof ArrayCollection) {
            $this->setParcelResponses(new ArrayCollection(
                is_array($this->parcelResponses) ? $this->parcelResponses : [$this->parcelResponses]
            ));
        }

        foreach ($this->parcelResponses as $parcel) {
            $parcel->init();
        }
    }

    /**
     * @return ArrayCollection<int, ParcelResponse>
     */
    public function getParcelResponses() : ArrayCollection
    {
        return $this->parcelResponses;
    }

    public function getParcelResponse(int $index = 0) : ParcelResponse
    {
        return $this->parcelResponses[$index];
    }

    /**
     * @return $this
     */
    public function addParcelResponse(ParcelResponse $parcelResponse) : static
    {
        $this->parcelResponses[] = $parcelResponse;

        return $this;
    }

    /**
     * @return $this
     */
    public function removeParcelResponse(ParcelResponse $parcelResponse) : static
    {
        if ($this->parcelResponses->contains($parcelResponse)) {
            $this->parcelResponses->removeElement($parcelResponse);
        }

        return $this;
    }

    /**
     * @param ArrayCollection<int, ParcelResponse> $parcelResponses
     * @return $this
     */
    public function setParcelResponses(ArrayCollection $parcelResponses) : static
    {
        $this->parcelResponses = new ArrayCollection();

        foreach ($parcelResponses as $parcelResponse) {
            $this->addParcelResponse($parcelResponse);
        }

        return $this;
    }

    public function getPDFLabels(): string
    {
        return is_resource($this->PDFLabels) ? (string)stream_get_contents($this->PDFLabels) : $this->PDFLabels;
    }

    /**
     * @param string|resource $PDFLabels
     * @return $this
     */
    public function setPDFLabels($PDFLabels): static
    {
        $this->PDFLabels = $PDFLabels;
        return $this;
    }

    public function getPickUpNumber() : string
    {
        return $this->pickUpNumber;
    }

    /**
     * @return $this
     */
    public function setPickUpNumber(string $pickUpNumber) : static
    {
        $this->pickUpNumber = $pickUpNumber;
        return $this;
    }
}
