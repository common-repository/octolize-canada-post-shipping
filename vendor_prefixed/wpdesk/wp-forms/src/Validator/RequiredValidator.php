<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Forms\Validator;

use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Validator;
class RequiredValidator implements Validator
{
    public function is_valid($value): bool
    {
        return $value !== null;
    }
    public function get_messages(): array
    {
        return [];
    }
}
