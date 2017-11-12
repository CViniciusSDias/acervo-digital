<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255, unique=true)
     */
    private $titulo;

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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", inversedBy="trabalhos")
     */
    private $tags;

    /**
     * @var LinhaPesquisa[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\LinhaPesquisa", inversedBy="trabalhos")
     */
    private $linhasPesquisa;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->linhasPesquisa = new ArrayCollection();
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

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): Trabalho
    {
        $this->titulo = $titulo;
        return $this;
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

    public function getLinhasPesquisa(): Collection
    {
        return $this->linhasPesquisa;
    }

    public function addLinhaPesquisa(LinhaPesquisa $linhaPesquisa): Trabalho
    {
        $this->linhasPesquisa->add($linhaPesquisa);
        return $this;
    }
}
