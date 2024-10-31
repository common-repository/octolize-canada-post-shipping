<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\PluginBuilder\BuildDirector;

use OctolizeShippingCanadaPostVendor\WPDesk\PluginBuilder\Builder\AbstractBuilder;
use OctolizeShippingCanadaPostVendor\WPDesk\PluginBuilder\Plugin\AbstractPlugin;
use OctolizeShippingCanadaPostVendor\WPDesk\PluginBuilder\Storage\StorageFactory;
class LegacyBuildDirector
{
    /** @var AbstractBuilder */
    private $builder;
    public function __construct(AbstractBuilder $builder)
    {
        $this->builder = $builder;
    }
    /**
     * Builds plugin
     */
    public function build_plugin()
    {
        $this->builder->build_plugin();
        $this->builder->init_plugin();
        $storage = new StorageFactory();
        $this->builder->store_plugin($storage->create_storage());
    }
    /**
     * Returns built plugin
     *
     * @return AbstractPlugin
     */
    public function get_plugin()
    {
        return $this->builder->get_plugin();
    }
}