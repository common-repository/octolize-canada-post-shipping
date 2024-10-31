<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Forms;

use OctolizeShippingCanadaPostVendor\Psr\Container\ContainerInterface;
use OctolizeShippingCanadaPostVendor\WPDesk\Persistence\PersistentContainer;
/**
 * Persistent container support for forms.
 *
 * @package WPDesk\Forms
 */
interface ContainerForm
{
    /**
     * @param ContainerInterface $data
     *
     * @return void
     */
    public function set_data(ContainerInterface $data);
    /**
     * Put data from form into a container.
     *
     * @return void
     */
    public function put_data(PersistentContainer $container);
}
