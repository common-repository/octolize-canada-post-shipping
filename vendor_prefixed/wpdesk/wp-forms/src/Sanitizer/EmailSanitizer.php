<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer;

use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer;
class EmailSanitizer implements Sanitizer
{
    public function sanitize($value): string
    {
        return sanitize_email($value);
    }
}
