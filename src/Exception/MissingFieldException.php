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

class MissingFieldException extends ClientException
{
    public final const MESSAGE = "The field '%s' is mandatory.";

    public function __construct(string $field)
    {
        parent::__construct(sprintf(self::MESSAGE, $field));
    }
}
