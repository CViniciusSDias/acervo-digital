<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="trabalho")
 * @ORM\Entity()
 */
class Trabalho
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
     * @var int
     *
     * @ORM\Column(name="anoPublicacao", type="integer")
     */
    private $anoPublicacao;

    /**
     * @var Autor
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Autor")
     */
    private $autor;

    /**
     * @var Orientador
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Orientador")
     */
    private $orientador;

    /**
     * @var Tag[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag")
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setAnoPublicacao(int $anoPublicacao): Trabalho
    {
        $this->anoPublicacao = $anoPublicacao;

        return $this;
    }

    public function getAnoPublicacao(): int
    {
        return $this->anoPublicacao;
    }

    public function getAutor(): Pessoa
    {
        return $this->autor;
    }

    public function setAutor(Pessoa $autor): Trabalho
    {
        $this->autor = $autor;
        return $this;
    }

    public function getOrientador(): Pessoa
    {
        return $this->orientador;
    }

    public function setOrientador(Pessoa $orientador): Trabalho
    {
        $this->orientador = $orientador;
        return $this;
    }

    public function getTags(): ArrayCollection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): Trabalho
    {
        $this->tags->add($tag);
        return $this;
    }


}
