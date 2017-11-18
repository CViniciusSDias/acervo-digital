<?php

namespace AppBundle\Repository;

class TrabalhoRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return int[]
     */
    public function buscarAnos(): array
    {
        $query = $this->createQueryBuilder('t')
            ->select('t.anoPublicacao')
            ->orderBy('t.anoPublicacao', 'DESC')
            ->distinct(true)
            ->getQuery();

        $arrayAnos = $query->execute();

        return array_map(function ($ano) {
            return $ano['anoPublicacao'];
        }, $arrayAnos);
    }

    public function buscarPorAno(int $ano): array
    {
        return $this->findBy(['anoPublicacao' => $ano]);
    }

    public function buscaGenerica(string $busca): array
    {
        $query = $this->createQueryBuilder('t')
            ->select('t')
            ->join('t.autor', 'a')
            ->join('t.orientador', 'o')
            ->join('t.linhasPesquisa', 'l')
            ->join('t.tags', 'tags')
            ->where('t.titulo LIKE :busca')
            ->orWhere('a.nome LIKE :busca')
            ->orWhere('o.nome LIKE :busca')
            ->orWhere('l.descricao LIKE :busca')
            ->orWhere('tags.nome LIKE :busca')
            ->setParameter('busca', "%$busca%")
            ->getQuery();

        return $query->execute();
    }
}
