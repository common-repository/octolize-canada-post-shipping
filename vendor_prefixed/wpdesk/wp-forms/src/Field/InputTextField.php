<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Forms\Field;

use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer;
use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer\TextFieldSanitizer;
class InputTextField extends BasicField
{
    public function get_sanitizer(): Sanitizer
    {
        return new TextFieldSanitizer();
    }
    public function get_template_name(): string
    {
        return 'input-text';
    }
}
