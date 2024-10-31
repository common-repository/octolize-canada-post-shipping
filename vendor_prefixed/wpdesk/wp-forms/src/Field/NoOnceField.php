<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Forms\Field;

use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Validator;
use OctolizeShippingCanadaPostVendor\WPDesk\Forms\Validator\NonceValidator;
class NoOnceField extends BasicField
{
    public function __construct(string $action_name)
    {
        $this->meta['action'] = $action_name;
    }
    public function get_validator(): Validator
    {
        return new NonceValidator($this->get_meta_value('action'));
    }
    public function get_template_name(): string
    {
        return 'noonce';
    }
}
