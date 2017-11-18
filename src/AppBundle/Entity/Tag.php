<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Classe resopnsável por representar uma palava-chave, que pode estar associada a um ou mais trabalhos
 * @ORM\Table(name="tag")
 * @ORM\Entity()
 */
class Tag
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
     * @ORM\Column(name="nome", type="string", length=255, unique=true)
     */
    private $nome;

    /**
     * @var Trabalho[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Trabalho", mappedBy="tags")
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

    public function setNome(string $nome): Tag
    {
        $this->nome = $nome;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTrabalhos(): Collection
    {
        return $this->trabalhos;
    }
}
