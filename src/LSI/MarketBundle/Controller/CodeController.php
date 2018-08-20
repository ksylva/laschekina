<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 31/07/2018
 * Time: 16:34
 */

namespace LSI\MarketBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CodeController extends Controller {
    public function nosEngagement(){
        return $this->render('LSIMarketBundle:code:nosengagements.html.twig');
    }
}