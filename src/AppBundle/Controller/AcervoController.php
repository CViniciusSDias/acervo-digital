<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trabalho;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class AcervoController extends Controller
{
    /**
     * @Route("/acervo/ano-publicacao", name="lista_anos")
     */
    public function anoPublicacaoAction(): Response
    {
        $anos = $this->getDoctrine()->getRepository(Trabalho::class)->buscarAnos();

        return $this->render('AppBundle:Acervo:ano_publicacao.html.twig', compact('anos'));
    }

    /**
     * @Route("/acervo/ano-publicacao/{ano}", name="trabalhos_por_ano")
     */
    public function trabalhosPorAnoAction(int $ano): Response
    {
        $trabalhos = $this->getDoctrine()->getRepository(Trabalho::class)->buscarPorAno($ano);

        return $this->render('@App/Acervo/trabalhos_por_ano.html.twig', compact('trabalhos'));
    }

    /**
     * @Route("/acervo/trabalho/{trabalho}", name="trabalho")
     */
    public function trabalho(Trabalho $trabalho): Response
    {
        return $this->render('@App/Acervo/trabalho.html.twig', compact('trabalho'));
    }
}
