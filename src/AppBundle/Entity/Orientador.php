<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="orientador")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrientadorRepository")
 */
class Orientador extends Pessoa
{
}
