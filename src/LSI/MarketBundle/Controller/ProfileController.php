<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 19/07/2018
 * Time: 10:59
 */

namespace LSI\MarketBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller {

    public function showAction(){
        $userManager = $this->get('fos_user.user_manager');
        $em = $this->getDoctrine()->getManager();
        $user = $userManager->getUser();

        if ($user->hasRole('ROLE_PART')){
            $repo = $em->getRepository('LSIMarketBundle:User')->findAdministreProfil($user);
        }elseif ($user->hasRole('ROLE_MAIRIE')){
            $repo = $em->getRepository('LSIMarketBundle:User')->findMairieProfil($user);
        }


        return $this->render('LSIMarketBundle:Profile:show.html.twig', array('user' => $user));
    }

    public function aProposAction(){
        return $this->render('LSIMarketBundle:Profile:a_propos.html.twig');
    }

    public function coordonneesBancairesAction(){
        return $this->render('LSIMarketBundle:Profile:coordonnees_bancaires.html.twig');
    }
}