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

use ReflectionClass;
use SoapFault;
use Exception;

class ExceptionManager implements ExceptionManagerInterface
{
    /** @var class-string<Exception>[] */
    protected $classes = [];

    /** @var class-string<Exception>[] */
    protected $defaultClasses = [
        InvalidPairZipcodeCityException::class,
        InvalidZipcodeException::class,
        MissingFieldException::class
    ];

    public function __construct(bool $default = true)
    {
        if ($default)
        {
            $this->addDefaultClasses();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addClass(string $class) : void
    {
        $this->classes[] = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function getClasses() : array
    {
        return $this->classes;
    }

    public function addDefaultClasses() : void
    {
        foreach ($this->defaultClasses as $class) {
            $this->addClass($class);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function handle(SoapFault $e) : void
    {
        $message = trim($e->getMessage());

        foreach ($this->classes as $class)
        {
            $results = [];
            if (preg_match('`' . str_replace('%s', '(.*?)', $class::MESSAGE) . '`is', $message, $results))
            {

                $rc = new ReflectionClass($class);
                unset($results[0]);
                throw $rc->newInstanceArgs($results);
            }
        }

        throw new ClientException($message, $e->getCode(), $e);
    }
}
