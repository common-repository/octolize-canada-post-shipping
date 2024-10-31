<?php

namespace OctolizeShippingCanadaPostVendor\Octolize\Tracker\OptInNotice;

/**
 * Should display always.
 */
class ShouldDisplayAlways implements ShouldDisplay
{
    /**
     * @inheritDoc
     */
    public function should_display()
    {
        return \true;
    }
}
