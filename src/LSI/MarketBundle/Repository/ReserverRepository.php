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

            //->addSelect('u')
            //->leftJoin('u.mairie', 'm')
            //->addSelect('u')
            ;

        $qb
            ->where('r.annonce = a.id')
            ->andWhere('a.mairie = m.id')
            ->andWhere('m.id = :id')
            ->setParameter('id', $userId)
            ;

        return $qb->getQuery()->getResult();
    }

}