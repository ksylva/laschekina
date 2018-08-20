<?php

namespace LSI\MarketBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LSIMarketBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
