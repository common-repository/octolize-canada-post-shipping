<?php

namespace OctolizeShippingCanadaPostVendor;

/**
 * WP Desk Tracker
 *
 * @class        WPDESK_Tracker
 * @version        1.3.2
 * @package        WPDESK/Helper
 * @category    Class
 * @author        WP Desk
 */
if (!\defined('ABSPATH')) {
    exit;
}
if (!\class_exists('OctolizeShippingCanadaPostVendor\WPDesk_Tracker_Data_Provider_Jetpack')) {
    /**
     * Class WPDesk_Tracker_Data_Provider_Jetpack
     */
    class WPDesk_Tracker_Data_Provider_Jetpack implements \WPDesk_Tracker_Data_Provider
    {
        /**
         * Info about jetpack.
         *
         * @return array Data provided to tracker.
         */
        public function get_data()
        {
            $data = [];
            $data['jetpack_version'] = \defined('OctolizeShippingCanadaPostVendor\JETPACK__VERSION') ? \OctolizeShippingCanadaPostVendor\JETPACK__VERSION : 'none';
            $data['jetpack_connected'] = \class_exists('OctolizeShippingCanadaPostVendor\Jetpack') && \is_callable('OctolizeShippingCanadaPostVendor\Jetpack::is_active') && Jetpack::is_active() ? 'yes' : 'no';
            $data['jetpack_is_staging'] = \class_exists('OctolizeShippingCanadaPostVendor\Jetpack') && \is_callable('OctolizeShippingCanadaPostVendor\Jetpack::is_staging_site') && Jetpack::is_staging_site() ? 'yes' : 'no';
            $data['connect_installed'] = \class_exists('OctolizeShippingCanadaPostVendor\WC_Connect_Loader') ? 'yes' : 'no';
            $data['connect_active'] = \class_exists('OctolizeShippingCanadaPostVendor\WC_Connect_Loader') && \wp_next_scheduled('wc_connect_fetch_service_schemas') ? 'yes' : 'no';
            return $data;
        }
    }
}
