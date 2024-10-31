<?php

/**
 * @package WPDesk\WooCommerceShipping\CanadaPost
 */
namespace OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\CanadaPost;

use OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\OrderMetaData\AdminOrderMetaDataDisplay;
use OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\OrderMetaData\SingleAdminOrderMetaDataInterpreterImplementation;
use OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\ShippingBuilder\WooCommerceShippingMetaDataBuilder;
/**
 * Can hide meta data in order.
 */
class CanadaPostAdminOrderMetaDataDisplay extends AdminOrderMetaDataDisplay
{
    /**
     * @param string $method_id .
     */
    public function __construct($method_id)
    {
        parent::__construct($method_id);
        $this->add_hidden_order_item_meta_key(WooCommerceShippingMetaDataBuilder::SERVICE_TYPE);
        $this->add_interpreter(new SingleAdminOrderMetaDataInterpreterImplementation(CanadaPostMetaDataBuilder::META_CANADA_POST_SERVICE_CODE, __('Canada Post Service Code', 'octolize-canada-post-shipping')));
    }
}
