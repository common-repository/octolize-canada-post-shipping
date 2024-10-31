<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Forms\Field;

use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Sanitizer\TextFieldSanitizer;
class DateField extends BasicField
{
    public function __construct()
    {
        $this->set_placeholder('YYYY-MM-DD');
    }
    public function get_type(): string
    {
        return 'date';
    }
    public function get_template_name(): string
    {
        return 'input-text';
    }
}
