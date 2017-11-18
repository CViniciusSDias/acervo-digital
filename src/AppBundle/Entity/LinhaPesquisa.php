<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * LinhaPesquisa
 *
 * @ORM\Table(name="linha_pesquisa")
 * @ORM\Entity()
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
     * @var Trabalho[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Trabalho", mappedBy="linhasPesquisa")
     */
    private $trabalhos;

    public function __construct()
    {
        $this->trabalhos = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setDescricao(string $descricao): LinhaPesquisa
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getTrabalhos(): Collection
    {
        return $this->trabalhos;
    }
}
