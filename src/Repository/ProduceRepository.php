<?php

namespace App\Repository;

use App\Entity\ProduceItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class ProduceRepository extends ServiceEntityRepository {
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, ProduceItem::class);
    }

    // These are items created through the new-produce-item path
    public function getShoppingListItems() {
        return $this->getEntityManager()
            ->createQuery('SELECT * FROM App\Entity\ProduceItem produceItem')
            ->getResult();
    }

//findAllRefrigeratorItemsByBoolean
    // These are items manually added to refrigerator after creation
    public function getRefrigeratorItems() {
        return $this->getEntityManager()
            ->createQuery('SELECT produceItem FROM App\Entity\ProduceItem produceItem WHERE produceItem.isInShoppingList = :bool ORDER BY produceItem.expirationDate ASC')
            ->setParameter('bool', false)
            ->getResult();
    }

//    public function list($produceItem) {
//        return $this->getEntityManager()
//            ->createQuery('SELECT produceItem FROM App\Entity\ProduceItem produceItem WHERE produceItem.name = :name')
//            ->setParameter('name', $produceItem)
//            ->getResult();
//    }

}