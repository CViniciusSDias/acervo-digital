<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinhaPesquisa
 *
 * @ORM\Table(name="linha_pesquisa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LinhaPesquisaRepository")
 */
class LinhaPesquisa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, unique=true)
     */
    private $descricao;


    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return LinhaPesquisa
     */
    public function setDescricao(string $descricao): LinhaPesquisa
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }
}