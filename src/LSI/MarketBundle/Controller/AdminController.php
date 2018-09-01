<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 20/08/2018
 * Time: 10:53
 */

namespace LSI\MarketBundle\Controller;


use LSI\MarketBundle\Entity\User;
use LSI\MarketBundle\Entity\Epci;
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
    public function ajouterEpciAction(Request $request){
       $epci = new Epci();
       $form = $this->createForm(EpciType::class, $epci);

       $form->handleRequest($request);
        //$error = "";
       if ($form->isSubmitted()){
           $em = $this->getDoctrine()->getManager();
           /*$cp = $form['codePostal']->getData();
           dump($cp);
           $cod = $cp[0]->getCode();
           $repo = $em->getRepository('LSIMarketBundle:CodePostal')->findCodePostal($cod);

           if ($repo == null){*/
               if ($form->isValid()){

                   $em->persist($epci);
                   $em->flush();
                   $request->getSession()->getFlashBag()->add('notice', 'EPCI ajouté avec succès !');
                   return $this->redirectToRoute('ls_imarket_liste_epci');
               }
           /*}else{
               $error = "Ce code postal existe déjà.";
           }*/
       }
       return $this->render('LSIMarketBundle:admin:ajout_epci.html.twig', array(
           'form' => $form->createView()));
    }

    // Liste tous les EPCIs existants ... Ok
    public function listeEpciAction(){
        $em = $this->getDoctrine()->getManager();

        $listeEpci = $em->getRepository('LSIMarketBundle:Epci')->findAllEpci();
        dump($listeEpci);

        return $this->render('LSIMarketBundle:admin:liste_epci.html.twig', array('listeepci' => $listeEpci));
    }

    public function voirEpciAction($id){
        $em = $this->getDoctrine()->getManager();

        // Récupère l'EPCI cliqué
        $epci = $em->getRepository('LSIMarketBundle:Epci')->findEpci($id);

        if (null === $epci){
             throw new NotFoundHttpException('L\'EPCI dont l\'id est'.$id.' n\'existe pas');
        }

        return $this->render('LSIMarketBundle:admin:voir_epci.html.twig', array('epci' => $epci));
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

        return $this->render('LSIMarketBundle:admin:modifier_epci.html.twig', array('form' => $form->createView()));
    }
}