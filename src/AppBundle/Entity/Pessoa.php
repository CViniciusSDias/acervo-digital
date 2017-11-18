<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe responsável por representar uma pessoa, podendo ela ser do tipo Autor ou Orientador
 * @ORM\MappedSuperclass()
 */
class Pessoa
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

    public function getId(): int
    {
        return $this->id;
    }

    public function setNome(string $nome): Pessoa
    {
        $this->nome = $nome;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}
