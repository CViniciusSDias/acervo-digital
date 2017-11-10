<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trabalho;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AcervoController extends Controller
{
    /**
     * @Route("/acervo/ano-publicacao")
     */
    public function anoPublicacaoAction()
    {
        $anos = $this->getDoctrine()->getRepository(Trabalho::class)->buscarAnos();

        return $this->render('AppBundle:Acervo:ano_publicacao.html.twig', compact('anos'));
    }

}
