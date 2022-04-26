<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNTExpress\Client;

use SoapClient;
use SoapHeader;
use SoapVar;

class SoapClientBuilder
{
    public final const SBX_LOGIN_NAME    = 'webservices@tnt.fr';
    public final const SBX_LOGIN_PASSWORD = 'test';
    public final const PRD_WSDL_URL = 'http://www.tnt.fr/service/?wsdl';

    protected string $login = '';

    protected string $password = '';

    protected string $wsdlUrl = '';

    /**
     * @var array<string, class-string>
     */
    protected $classmap = [
        'Address'             => \TNTExpress\Model\Address::class,
        'city'                => \TNTExpress\Model\City::class,
        'dropOffPoint'        => \TNTExpress\Model\DropOffPoint::class,
        'fullAddress'         => \TNTExpress\Model\FullAddress::class,
        'fullAddressPlusInfo' => \TNTExpress\Model\FullAddressPlusInfo::class,
        'parcelRequest'       => \TNTExpress\Model\ParcelRequest::class,
        'receiver'            => \TNTExpress\Model\Receiver::class,
        'sender'              => \TNTExpress\Model\Sender::class,
        'pickUpRequest'       => \TNTExpress\Model\PickUpRequest::class,
        'expeditionResponse'  => \TNTExpress\Model\Expedition::class,
        'service'             => \TNTExpress\Model\Service::class,
        'parcelResponse'      => \TNTExpress\Model\ParcelResponse::class,
        'parcel'              => \TNTExpress\Model\Parcel::class,
        'event'               => \TNTExpress\Model\Events::class,
        'expeditionCreationParameter' => \TNTExpress\Model\ExpeditionRequest::class,
    ];

    /**
     * @param array<string, class-string> $classmap
     */
    public function __construct(string $login = '', string $password = '', array $classmap = [], string $wsdlUrl = '')
    {
        $this->login    = $login;
        $this->password = $password;
        $this->classmap = array_merge($this->classmap, $classmap);
        $this->wsdlUrl = $wsdlUrl !== '' ? $wsdlUrl : self::PRD_WSDL_URL;
    }

    /**
     * Returns a new SoapClient.
     */
    public function createClient(bool $useSandbox = false) : SoapClient
    {
        $client = new SoapClient($this->wsdlUrl, ['soap_version' => SOAP_1_1, 'classmap' => $this->classmap]);
        $login    = $useSandbox ? self::SBX_LOGIN_NAME    : $this->login;
        $password = $useSandbox ? self::SBX_LOGIN_PASSWORD : $this->password;
        $client->__setSOAPHeaders($this->getSecurityHeader($login, $password));
        return $client;
    }

    /**
     * Return an instance of SoapHeader for WS Security.
     */
    public function getSecurityHeader(string $login, string $password) : SoapHeader
    {
        $authHeader = sprintf(
            $this->getSecurityHeaderTemplate(),
            htmlspecialchars($login),
            htmlspecialchars($password)
        );

        return new SoapHeader(
            'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd',
            'Security',
            new SoapVar($authHeader, XSD_ANYXML)
        );
    }

    /**
     * Return template for WS Security header.
     */
    protected function getSecurityHeaderTemplate() : string
    {
        return
            '<wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
              <wsse:UsernameToken>
                <wsse:Username>%s</wsse:Username>
                <wsse:Password>%s</wsse:Password>
             </wsse:UsernameToken>
            </wsse:Security>'
        ;
    }
}
