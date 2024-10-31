<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer;

use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer;
class NoSanitize implements Sanitizer
{
    public function sanitize($value)
    {
        return $value;
    }
}
