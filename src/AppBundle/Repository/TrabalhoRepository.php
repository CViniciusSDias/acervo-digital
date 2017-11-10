<?php

namespace AppBundle\Repository;

class TrabalhoRepository extends \Doctrine\ORM\EntityRepository
{
    public function buscarAnos(): array
    {
        $query = $this->createQueryBuilder('t')
            ->select('t.anoPublicacao')
            ->orderBy(  't.anoPublicacao', 'DESC')
            ->distinct(true)
            ->getQuery();

        $arrayAnos = $query->execute();

        return array_map(function ($ano) {
            return $ano['anoPublicacao'];
        }, $arrayAnos);
    }
}
