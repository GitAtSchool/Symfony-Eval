<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * AppRepository
 *
 */
class AppRepository extends EntityRepository {

    public function findDQL($id = NULL) {
        $qb = $this->createQueryBuilder('entity');
        if (!is_null($id)) {
            $qb->add('where', $qb->expr()->like('entity.id', ':id'));
            $qb->setParameter('id', $id);
        }

        $query = $qb->getQuery();

        return $query;
    }

    public function findAllDQL() {
        return $this->findDQL();
    }

}
