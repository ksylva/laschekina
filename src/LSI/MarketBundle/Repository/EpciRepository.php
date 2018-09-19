<?php
/**
 * Created by PhpStorm.
 * User: Sylvanus KONAN
 * Date: 20/08/2018
 * Time: 15:06
 */

namespace LSI\MarketBundle\Repository;


use Doctrine\ORM\EntityRepository;

class EpciRepository extends EntityRepository {

    // Récupérer le nom de l'epci
    public function findEpciCodePostal($cp){
        $qb = $this->createQueryBuilder('e.nom')
            ->join('e.codePostal', 'cp')
            ->addSelect('cp');

        $qb
            ->where($qb->expr()->in('cp.code', $cp))
            /*->andWhere('cp.code = :code')
            ->setParameter('code', $cp)*/
            ;

        return $qb->getQuery()->getScalarResult();
    }

    // Récupérer toutes les epci
    public function findAllEpci(){
        $qb = $this->createQueryBuilder('e')
            ->innerJoin('e.codePostal', 'cp')
            ->addSelect('cp')
            //->orderBy('e.nom', 'ASC')
            ;

        return $qb->getQuery()->getResult();
    }

    // R2cup2rer un epci
    public function findEpci($id){
        $qb = $this->createQueryBuilder('e')
            ->join('e.codePostal', 'cp')
            ->addSelect('cp')
            ;

        $qb
            ->where('e.id = :id')
            ->setParameter('id', $id)
            //->andWhere('e.codePostal = cp.id')
            ;

        return $qb->getQuery()->getSingleResult();
    }

    // Lister les EPCI sur le formulaire d'inscription mairie...
    public function getListEpci(){
        return $this
            ->createQueryBuilder('e')
            ->join('e.codePostal', 'cp')
            ->addSelect('cp')
            ->orderBy('e.nom', 'ASC')
            ;

    }
}