<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Persistence;

use OctolizeShippingCanadaPostVendor\Psr\Container\NotFoundExceptionInterface;
/**
 * @package WPDesk\Persistence
 */
class ElementNotExistsException extends \RuntimeException implements NotFoundExceptionInterface
{
}
