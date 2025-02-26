<?php

/**
 * Shipping builder: WooCommerceShippingMetaDataBuilder.
 *
 * @package WPDesk\WooCommerceShipping\ShippingBuilder;
 */
namespace OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\ShippingBuilder;

use OctolizeShippingCanadaPostVendor\WPDesk\AbstractShipping\CollectionPoints\CollectionPoint;
use OctolizeShippingCanadaPostVendor\WPDesk\AbstractShipping\Rate\SingleRate;
use OctolizeShippingCanadaPostVendor\WPDesk\AbstractShipping\Shipment\Shipment;
use OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\CollectionPoints\CollectionPointFormatter;
use OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\EstimatedDelivery\EstimatedDeliveryMetaDataBuilder;
use OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\OrderMetaData\PackedPackagesMetaDataBuilder;
use OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\ShippingMethod;
use OctolizeShippingCanadaPostVendor\WPDesk\WooCommerceShipping\ShippingMethod\HasEstimatedDeliveryDates;
/**
 * Build metadata for rate.
 *
 * @package WPDesk\ShippingBuilder\Address
 */
class WooCommerceShippingMetaDataBuilder
{
    const COLLECTION_POINT = 'collection_point';
    const YES = 'yes';
    const NO = 'no';
    const COLLECTION_POINT_ID = 'collection_point_id';
    const COLLECTION_POINT_ADDRESS = 'collection_point_address';
    const SERVICE_TYPE = 'service_type';
    /**
     * Shipping method.
     *
     * @var ShippingMethod
     */
    private $shipping_method;
    /**
     * WooCommerceShippingMetaDataBuilder constructor.
     *
     * @param ShippingMethod $shipping_method .
     */
    public function __construct(ShippingMethod $shipping_method)
    {
        $this->shipping_method = $shipping_method;
    }
    /**
     * Build metadata for standard rate.
     *
     * @param SingleRate $rate .
     * @param Shipment $shipment Shipment.
     *
     * @return array
     */
    public function build_meta_data_for_rate(SingleRate $rate, Shipment $shipment)
    {
        return $this->create_meta_data($rate, self::NO, $shipment);
    }
    /**
     * Build metadata for rate to collection point.
     *
     * @param SingleRate $rate .
     * @param CollectionPoint|null $collection_point .
     * @param Shipment $shipment Shipment.
     *
     * @return array
     */
    public function build_meta_data_for_rate_to_collection_point(SingleRate $rate, $collection_point, Shipment $shipment)
    {
        $meta_data = $this->create_meta_data($rate, self::YES, $shipment);
        if (null !== $collection_point) {
            $meta_data = $this->append_collection_point_data($meta_data, $collection_point);
        }
        return $meta_data;
    }
    /**
     * Build metadata to collection point.
     *
     * @param CollectionPoint|null $collection_point .
     *
     * @return array
     */
    public function build_meta_data_to_collection_point(CollectionPoint $collection_point)
    {
        return $this->append_collection_point_data($this->create_meta_data(null, self::YES), $collection_point);
    }
    /**
     * Create meta data.
     *
     * @param SingleRate|null $rate .
     * @param string $collection_point .
     * @param Shipment|null $shipment .
     *
     * @return array
     */
    private function create_meta_data($rate, $collection_point = self::NO, $shipment = null)
    {
        $meta_data = [self::COLLECTION_POINT => $collection_point];
        if (isset($rate)) {
            $meta_data[self::SERVICE_TYPE] = $rate->service_type;
            if ($this->shipping_method instanceof HasEstimatedDeliveryDates) {
                $meta_data = $this->append_delivery_dates_if_supported_and_exists($meta_data, $rate);
            }
        }
        if ($shipment) {
            $meta_data = $this->append_packages_meta_data_if_packed($meta_data, $shipment);
        }
        return $meta_data;
    }
    /**
     * Append collection point data.
     *
     * @param array $meta_data .
     * @param CollectionPoint|null $collection_point .
     *
     * @return array
     */
    private function append_collection_point_data(array $meta_data, $collection_point)
    {
        $meta_data[self::COLLECTION_POINT_ID] = $collection_point->collection_point_id;
        $collection_point_formatter = new CollectionPointFormatter();
        $meta_data[self::COLLECTION_POINT_ADDRESS] = $collection_point_formatter->get_collection_point_as_label($collection_point);
        return $meta_data;
    }
    /**
     * Append packages meta data if packed.
     *
     * @param array $meta_data
     * @param Shipment $shipment
     *
     * @return array
     */
    private function append_packages_meta_data_if_packed(array $meta_data, Shipment $shipment)
    {
        if ($shipment->packed) {
            $meta_data_builder = new PackedPackagesMetaDataBuilder($shipment);
            $meta_data['packed_packages'] = $meta_data_builder->create_meta_data();
        }
        return $meta_data;
    }
    /**
     * Append delivery dates if exists.
     *
     * @param array $meta_data
     * @param SingleRate $rate
     *
     * @return array
     */
    private function append_delivery_dates_if_supported_and_exists(array $meta_data, SingleRate $rate)
    {
        $metadata_builder = new EstimatedDeliveryMetaDataBuilder($this->shipping_method);
        $meta_data = $metadata_builder->append_delivery_dates_metadata_if_exists($meta_data, $rate);
        return $meta_data;
    }
}
