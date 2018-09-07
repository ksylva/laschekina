<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 04/09/2018
 * Time: 09:49
 */

namespace LSI\MarketBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EspaceController extends Controller {
    public function administreIndexAction(){
        return $this->render('LSIMarketBundle:administre:index_administre.html.twig');
    }
}