<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 26/05/13
 * Time: 00:22
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\ApiBundle\Entity;


use Doctrine\ORM\EntityRepository;

class MensajeRepository extends EntityRepository{
    public function findLatests($limit = 10){
        $qb = $this->createQueryBuilder('m')
            ->orderBy('m.id', 'DESC');
        if ($limit) {
            $qb = $qb->setMaxResults($limit);
        }
        $query = $qb->getQuery();
        return $query->getResult();
    }

}