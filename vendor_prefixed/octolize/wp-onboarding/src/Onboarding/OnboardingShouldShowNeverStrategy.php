<?php

/**
 * @package Octolize\Onboarding
 */
namespace OctolizeShippingCanadaPostVendor\Octolize\Onboarding;

/**
 * Never display strategy.
 */
class OnboardingShouldShowNeverStrategy implements OnboardingShouldShowStrategy
{
    public function should_display(): bool
    {
        return \false;
    }
}