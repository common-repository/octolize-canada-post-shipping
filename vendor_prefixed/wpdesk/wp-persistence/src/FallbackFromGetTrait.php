<?php

namespace OctolizeShippingCanadaPostVendor\WPDesk\Persistence;

use OctolizeShippingCanadaPostVendor\Psr\Container\NotFoundExceptionInterface;
trait FallbackFromGetTrait
{
    public function get_fallback(string $id, $fallback = null)
    {
        try {
            return $this->get($id);
        } catch (NotFoundExceptionInterface $e) {
            return $fallback;
        }
    }
}
