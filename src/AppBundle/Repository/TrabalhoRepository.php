<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Trabalho;
use Doctrine\ORM\EntityRepository;

/**
 * Classe que faz a ligação com o banco de dados, buscando informações dos trabalhos
 * @package AppBundle\Repository
 */
class TrabalhoRepository extends EntityRepository
{
    /**
     * Busca os anos que existem trabalhos feitos, ordenados de forma decrescente
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

    /**
     * Busca os trabalhos de determinado ano
     * @param int $ano
     * @return Trabalho[]
     */
    public function buscarPorAno(int $ano): array
    {
        return $this->findBy(['anoPublicacao' => $ano]);
    }

    /**
     * Realiza uma busca textual por trabalho.
     *
     * O critério para a busca é: O texto buscado está contido no titulo do trabalho, nome do autor, nome do orientador,
     * descrição de uma das linhas de pesquisa ou nome de uma das palavras chave.
     *
     * @param string $busca
     * @return Trabalho[]
     */
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
