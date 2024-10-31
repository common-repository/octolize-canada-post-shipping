<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer;

use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer;
class CallableSanitizer implements Sanitizer
{
    /** @var callable */
    private $callable;
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }
    public function sanitize($value): string
    {
        return call_user_func($this->callable, $value);
    }
}
