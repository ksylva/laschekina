<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 22/07/2018
 * Time: 15:37
 */

namespace LSI\MarketBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ReserverRepository extends  EntityRepository {

    public function mesReservations($idAuteur){
        $qb = $this->createQueryBuilder('r');

        $qb
            ->where('r.user = :user')
            ->setParameter('user', $idAuteur);

        return $qb->getQuery()->getResult();
    }

    // Les réservations sur mes annonces
    public function annonceReserver($userId){
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.annonce', 'a')
            ->addSelect('a')
            ->leftJoin('a.mairie', 'm')
            ->addSelect('m')
            ->innerJoin('r.user', 'u')
            ->addSelect('u')

            //->addSelect('u')
            //->leftJoin('u.mairie', 'm')
            //->addSelect('u')
            ;

        $qb
            ->where('m.id = :id')
           // ->andWhere('a.mairie = m.id')
            ->andWhere('m.id = r.annonce')
            ->setParameter('id', $userId)
        ;

        return $qb->getQuery()->getResult();
    }

// Requete pour recuperer les reservations du demanduer
    public function findreserveSurMesannonces($id) {
        $qb = $this->createQueryBuilder('r');
        $qb->innerJoin('r.annonce', 'a')
            ->addSelect('a')
            ->innerJoin('a.images', 'img')
            ->addSelect('img')
            ->innerJoin('a.categorie', 'categ')
            ->addSelect('categ')
            ->innerJoin('r.user', 'u')
            ->addSelect('u')
            /*->innerJoin('u.mairie', 'm')
            ->addSelect('m')
            ->innerJoin('u.administre', 'ad')
            ->addSelect('ad')*/;
        $qb->where('u.id= :id')
            ->setParameter('id', $id);

        $rep = $qb->getQuery()->getResult();

        return $rep;
    }

    // Renvoyer id de la mairie qui a cree l'annonce

    public function findIdMairie(){
        $req = $this->createQueryBuilder('r');
            $req->innerJoin('r.annonce', 'a')
                ->addSelect('a')
                ->innerJoin('a.mairie', 'm')
                ->addSelect('m');
            $req->select('m.id');

            return $req->getQuery()->getResult();
    }

    // recuperer les reservations qui on été faites sur l'annonce de l'auteur

    public function reserveSurMesannonces($idmairie) {
        $qb = $this->createQueryBuilder('r');
        $qb->innerJoin('r.annonce', 'a')
            ->addSelect('a')
            ->innerJoin('a.images', 'img')
            ->addSelect('img')
            ->innerJoin('a.categorie', 'categ')
            ->addSelect('categ')
            ->innerJoin('r.user', 'u')
            ->addSelect('u')
            ->innerJoin('u.mairie', 'm')
            ->addSelect('m');

        $qb->where('m.id= :id')
           // ->andWhere('r.user = r.annonce')
            ->andWhere('u.id = a.id')
            ->setParameter('id', $idmairie);

        $rep = $qb->getQuery()->getResult();

        return $rep;
    }

}