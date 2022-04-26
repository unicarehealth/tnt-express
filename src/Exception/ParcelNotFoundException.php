<?php

/*
 * This file is part of the TNTExpress package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNTExpress\Exception;

class ParcelNotFoundException extends ClientException
{
    public final const MESSAGE = "Parcel number '%s' is not found.";

    public function __construct(string $number)
    {
        parent::__construct(sprintf(self::MESSAGE, $number));
    }
}
