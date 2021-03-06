<?php

namespace Core2Bundle\Repository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends \Doctrine\ORM\EntityRepository
{
    public function  retourListProduit($cat)
    {
        $qb = $this->createQueryBuilder('p');
        
        $qb->select('p')
                ->where('p.categorie = :cat')
                ->setParameter('cat', $cat);
        return $qb->getQuery()->getResult();
    }
    
    public function  retourNomProduit()
    {
        $qb = $this->createQueryBuilder('p');
        
        $qb->select()
                ->where('p.name like ?1') //soit en travail avec ?numero ou avec :
                ->andWhere('p.qte > :qte')
                ->setParameter(1, '%'."prod".'%')
                ->setParameter('qte', 1)
                ->leftJoin('p.categorie', 'c'); 
//        p.categorie : nom jointure dans orm
        return $qb->getQuery()->getResult();
//        return $qb->getQuery()->getDQL();
    }
}
