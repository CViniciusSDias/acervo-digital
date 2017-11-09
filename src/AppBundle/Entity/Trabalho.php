<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="trabalho")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrabalhoRepository")
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
     * @var \DateTime
     *
     * @ORM\Column(name="anoPublicacao", type="date")
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
    private $orientadaor;

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

    public function setAnoPublicacao(\DateTime $anoPublicacao): Trabalho
    {
        $this->anoPublicacao = $anoPublicacao;

        return $this;
    }

    public function getAnoPublicacao(): \DateTime
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

    public function getOrientadaor(): Pessoa
    {
        return $this->orientadaor;
    }

    public function setOrientadaor(Pessoa $orientadaor): Trabalho
    {
        $this->orientadaor = $orientadaor;
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
