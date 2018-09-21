<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 20/07/2018
 * Time: 10:15
 */

namespace LSI\MarketBundle\Repository;


use Doctrine\ORM\EntityRepository;
use LSI\MarketBundle\Entity\Categorie;

class AnnonceRepository extends EntityRepository {

    // Recuperer l'auteur d'une annonce.
    public function findAuteurAnnonce($id){ // $id est l'id de la mairie auteure de l'annonce
        $qb = $this->createQueryBuilder('m')
                    ->join('m.id', 'LSI\MarketBundle\Entity\User u')
                    ->addSelect('u')
                    ;

        $qb
            ->where('m.id = :id')
            ->setParameter('id', $id)
            ->andWhere('m.id = u.mairie')
            ;
        return $qb->getQuery()->getScalarResult();
    }

    // Recuperer les annonces en fonction de leurs auteurs.
    public function findMesAnnonces($id){ //$id est l'id de l'auteur de l'annonce
        $qb = $this->createQueryBuilder('a');

        $qb
            ->where('a.mairie = :id')
                ->setParameter('id', $id);

        //Retourne un tableau d'annonce.
        return $qb->getQuery()->getResult();
    }

    // recuperer le titre de l'annonce en fonction de son id
    public function titreAnnonce($id){
        $qb = $this->createQueryBuilder('a')
                    ->select('a.titre') // Pour selectionner le titre
        ;

        $qb->where('a.id = :id')
            ->setParameter('id', $id)
            ;
        // Retourner un seul resultat, le titre de l'annonce concernee.
        return $qb->getQuery()->getSingleResult();
    }

    /*
     * Requête de recherche d'une annonce à travers le titre ou la description
     * */
    public function findAnnParTitreOuDescp($motcle)  {
        $queryb = $this->createQueryBuilder('a');
        $queryb->innerJoin('a.images', 'img')
            ->where('a.titre like :titre or a.description like :description')
            ->setParameter('titre', '%'.$motcle.'%')
            ->setParameter('description', '%'.$motcle.'%');

        return $queryb->getQuery()->getResult();
    }


// Recherche par titre ou description
    public function findTitreDescp($mot)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->innerJoin('a.images', 'img')
            ->innerJoin('a.categorie', 'categ')
            ->addSelect('categ')
            ->addSelect('img')
            ->where('a.titre like :titre or a.description like :description')
            ->setParameter('titre', '%'.$mot.'%')
            ->setParameter('description', '%'.$mot.'%');

        $result = $qb->getQuery()->getResult();
        return $result;
    }

    // Recherche par categorie

    public function findCategorie($categorie){
        $query = $this->createQueryBuilder('an');
        $query->innerJoin('an.images', 'img')
            ->addSelect('img')
            ->innerJoin('an.categorie', 'categ')
            ->addSelect('categ')
            ->where('categ.id= :id')
            ->setParameter('id', $categorie);
        $result = $query->getQuery()->getResult();

        return $result;
    }

    // Recherche par categorie ou prix

    public function findCategorieAndPrix($categorie, $prix){
        $query = $this->createQueryBuilder('an');
        $query->innerJoin('a.images', 'img')
            ->addSelect('img')
            ->innerJoin('a.categorie', 'categ')
            ->addSelect('categ')
            ->where('categ.id= :id')
            ->setParameter('id', $categorie)
            ->orwhere('a.prixDefaut < :prixDefaut')
            ->setParameter('prixDefaut', $prix);
        $query->getQuery()->getResult();

        return $query;
    }

    // Recherche par Budget

    public function findBudget($budget){
        $query = $this->createQueryBuilder('an');
        $query->innerJoin('an.images', 'img')
            ->addSelect('img')
            ->innerJoin('an.categorie', 'categ')
            ->addSelect('categ')
            ->where('an.prixDefaut<= :prixDefaut')
            ->setParameter('prixDefaut', $budget);
        $result = $query->getQuery()->getResult();

        return $result;
    }

    // Recherche par periode

    public function findPeriode($date){
        $query = $this->createQueryBuilder('an');
        $query->innerJoin('an.images', 'img')
            ->addSelect('img')
            ->innerJoin('an.categorie', 'categ')
            ->addSelect('categ')
            ->where('an.dateCreation= :dateCreation')
            ->setParameter('dateCreation', $date);
        $result = $query->getQuery()->getResult();

        return $result;
    }
    // Recherche par la ville
    public function findVille($ville){
        $query = $this->createQueryBuilder('an');
        $query->innerJoin('an.images', 'img')
            ->addSelect('img')
            ->innerJoin('an.categorie', 'categ')
            ->addSelect('categ')
            ->innerJoin('an.mairie', 'm')
            ->addSelect('m')
            ->innerJoin('m.user', 'u')
            ->addSelect('u')
            ->where('u.ville= :ville')
            ->setParameter('dateCreation', $ville);
        $result = $query->getQuery()->getResult();

        return $result;
    }

    // Recherche par la ville et categorie et prix et statut
    public function findVilleAndPeriodAndCategAndDate($ville,$categ, $prix,$libelle){
        $query = $this->createQueryBuilder('an');
        $query->innerJoin('an.images', 'img')
            ->addSelect('img')
            ->innerJoin('an.statut', 'stat')
            ->addSelect('stat')
            ->where('an.prixDefaut >= :prixDefaut')
            ->setParameter('prixDefaut', $prix)
            ->andWhere('stat.libelle >= :libelle')
            ->setParameter('libelle', $libelle)
            ->innerJoin('an.categorie', 'categ')
            ->addSelect('categ')
            ->where('categ.id= :id')
            ->setParameter('id', $categ)
            ->innerJoin('an.mairie', 'm')
            ->addSelect('m')
            ->innerJoin('m.user', 'u')
            ->addSelect('u')
            ->where('u.ville= :ville')
            ->setParameter('dateCreation', $ville);
        $result = $query->getQuery()->getResult();

        return $result;
    }

    public function requeteAffiner(Categorie $cat, $ville, $budget, $periode, $prix){
        $qb = $this->createQueryBuilder('a')
                    ->leftJoin('a.image', 'i')
                    ->addSelect('i')
        ;

        // Ajoute la catégorie si elle n'est pas vide...
        if ($cat !== null) {
            $qb->leftJoin('a.categorie', 'c')
                ->addSelect('c')
                ->where('c.id = :cat')
                ->setParameter('cat', $cat);
        }

        // ...
        if ($ville !== null) {
            $qb->leftJoin('a.mairie', 'm')
                ->addSelect('m')
                ->join('m.id', 'u')
                ->addSelect('u')
                ->andWhere('m.id = u.mairie')
                ->andWhere('u.ville = :ville')
                ->setParameter('ville', $ville);
        }

        // ...
        if($budget !== null){
            $qb->andWhere('a.prixDefaut <= :budget')
                ->setParameter('budget', $budget);
        }

        // Période n'est pas encore définie dans la création de l'annonce...
        if($periode !== null){

        }

        if($prix !== null){
            $qb->andWhere('a.prixDefaut = :prix')
                ->setParameter('prix', $prix);
        }

        return $qb->getQuery()->getResult();
    }
    public function findPeriodDispo($debut, $fin) {
        $qb = $this->createQueryBuilder('a')
                   ->innerJoin('a.calendrier', 'c')
                    ->addSelect('c')
                    ->where('c.debut = :debut')
                    ->setParameter('debut', $debut)
                    ->andWhere('c.fin = :fin')
                    ->setParameter('fin', $fin);
        return $qb->getQuery()->getResult();

    }

    public function findAnnoncesAvecCalendrier($id){
        $qb = $this->createQueryBuilder('a')
            ->join('a.calendrier', 'c')
            ->addSelect('c')
            ->where('a.id = :id')
            ->setParameter('id', $id)
            ;
        return $qb->getQuery()->getResult();

    }


}