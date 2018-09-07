<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 20/08/2018
 * Time: 10:53
 */

namespace LSI\MarketBundle\Controller;

use LSI\MarketBundle\Entity\ConditionsGeneralesVentes;
use LSI\MarketBundle\Form\ConditionsGeneralesVentesType;
use LSI\MarketBundle\Entity\ConditionsGeneralesUtil;
use LSI\MarketBundle\Entity\User;
use LSI\MarketBundle\Entity\Epci;
use LSI\MarketBundle\Form\ConditionsGeneralesUtilType;
use LSI\MarketBundle\Form\EpciType;
use LSI\MarketBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdminController extends Controller  {
    public function superAdminAction(){
        return $this->render('LSIMarketBundle:superadmin:admin.html.twig');
    }

    public function addAdminAction(Request $request){
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $user->setRoles(array('ROLE_ADMIN'));
            $user->setEnabled(true);

            if ($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('ls_imarket_superadmin');
            }
        }
        return $this->render('LSIMarketBundle:superadmin:add_admin.html.twig', array('form' => $form->createView()));
    }

    //Accueil admin
    public function indexAdminAction(){
        return $this->render('LSIMarketBundle:admin:index.html.twig');
    }

    // Ajoute un EPCI ... Ok
    public function ajouterEpciAction(Request $request) {
        $epci = new Epci();
        $form = $this->createForm(EpciType::class, $epci);

        $form->handleRequest($request);
        //$error = "";
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            if ($form->isValid()) {

                $em->persist($epci);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'EPCI ajouté avec succès !');
                return $this->redirectToRoute('ls_imarket_liste_epci');
            }
        }
        return $this->render('@LSIMarket/admin/gestion_epci/ajout_epci.html.twig', array(
            'form' => $form->createView()));
    }

    // Liste tous les EPCIs existants ... Ok
    public function listeEpciAction(){
        $em = $this->getDoctrine()->getManager();

        $listeEpci = $em->getRepository('LSIMarketBundle:Epci')->findAllEpci();
        //dump($listeEpci);

        return $this->render('@LSIMarket/admin/gestion_epci/liste_epci.html.twig', array('listeepci' => $listeEpci));
    }

    public function voirEpciAction($id){
        $em = $this->getDoctrine()->getManager();

        // Récupère l'EPCI cliqué
        $epci = $em->getRepository('LSIMarketBundle:Epci')->findEpci($id);

        if (null === $epci){
             throw new NotFoundHttpException('L\'EPCI dont l\'id est'.$id.' n\'existe pas');
        }

        return $this->render('@LSIMarket/admin/gestion_epci/voir_epci.html.twig', array('epci' => $epci));
    }

    public function modifierEpciAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();

        $epci = $em->getRepository('LSIMarketBundle:Epci')->find($id);

        if (null === $epci){
            throw new NotFoundHttpException("L'EPCI dont le numéro est ".$id." n'existe pas.");
        }

        $form = $this->createForm(EpciType::class, $epci);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();

            if ($form->isValid()){
                $em->persist($epci);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'EPCI modifié avec succès');
                return $this->redirectToRoute('ls_imarket_liste_epci');
            }
        }

        return $this->render('@LSIMarket/admin/gestion_epci/modifier_epci.html.twig', array('form' => $form->createView()));
    }

    // +++++++++++++++++++++++++++++++++++++++++++++ CGU +++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function ajouterCguAction(Request $request){
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous n\'avez pas accès à cette url !');
        $cgu = new ConditionsGeneralesUtil();
        $form = $this->createForm(ConditionsGeneralesUtilType::class, $cgu);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($cgu);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Les Conditions Générales d\'Utilisation ont été éditer !');

            return $this->redirectToRoute('ls_imarket_voir_cgu');
        }
        return $this->render('@LSIMarket/admin/gestion_cgu_cgv/cgu_aj.html.twig', array('form' => $form->createView()));
    }

    public function voirCguAction(){
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous n\'avez pas accès à cette url !');
        $em = $this->getDoctrine()->getManager();

        $cgu = $em->getRepository('LSIMarketBundle:ConditionsGeneralesUtil')->find(1);

        if (null === $cgu){
            throw new NotFoundHttpException('Les CGU n\'ont pas encore ete edite.');
        }

        return $this->render('@LSIMarket/admin/gestion_cgu_cgv/cgu_voir.html.twig', array('cgu' => $cgu));
    }

    public function modifierCguAction(Request $request){
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous n\'avez pas accès à cette url !');
        $em = $this->getDoctrine()->getManager();

        //recupération de l'objet à modifier
        $editCgu = $em->getRepository('LSIMarketBundle:ConditionsGeneralesUtil')->find(1);

        if (null === $editCgu){
            throw new NotFoundHttpException('La CGU n\'existe pas.');
        }

        $form = $this->createForm(ConditionsGeneralesUtilType::class, $editCgu);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em->persist($editCgu);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Les Conditions Générales d\'Utilisation ont été mis à jour !');

            return $this->redirectToRoute('ls_imarket_voir_cgu');
        }

        return $this->render('@LSIMarket/admin/gestion_cgu_cgv/cgu_mod.html.twig', array('form' => $form->createView()));
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++ CGV ++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function ajouterCgvAction(Request $request){
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous n\'avez pas accès à cette url !');
        $cgv = new ConditionsGeneralesVentes();
        $form = $this->createForm(ConditionsGeneralesVentesType::class, $cgv);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($cgv);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Les Conditions Générales de Ventes ont été édité !');

            return $this->redirectToRoute('ls_imarket_voir_cgv');
        }
        return $this->render('@LSIMarket/admin/gestion_cgu_cgv/cgv_aj.html.twig', array('form' => $form->createView()));
    }

    public function voirCgvAction(){
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous n\'avez pas accès à cette url !');
        $em = $this->getDoctrine()->getManager();

        $cgv = $em->getRepository('LSIMarketBundle:ConditionsGeneralesVentes')->find(1);

        if (null === $cgv){
            throw new NotFoundHttpException('Les CGV n\'ont pas encore ete édité.');
        }

        return $this->render('@LSIMarket/admin/gestion_cgu_cgv/cgv_voir.html.twig', array('cgv' => $cgv));
    }

    public function modifierCgvAction(Request $request){
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous n\'avez pas accès à cette url !');
        $em = $this->getDoctrine()->getManager();

        //recupération de l'objet à modifier
        $editCgv = $em->getRepository('LSIMarketBundle:ConditionsGeneralesVentes')->find(1);

        if (null === $editCgv){
            throw new NotFoundHttpException('La CGV n\'existe pas.');
        }

        $form = $this->createForm(ConditionsGeneralesUtilType::class, $editCgv);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em->persist($editCgv);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Les Conditions Générales de Ventes ont été mis à jour !');

            return $this->redirectToRoute('ls_imarket_voir_cgv');
        }

        return $this->render('@LSIMarket/admin/gestion_cgu_cgv/cgv_mod.html.twig', array('form' => $form->createView()));
    }

}