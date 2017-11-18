<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Autor;
use AppBundle\Entity\LinhaPesquisa;
use AppBundle\Entity\Orientador;
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
        $titulo = "Trabalhos de $ano";

        return $this->render('@App/Acervo/trabalhos.html.twig', compact('trabalhos', 'titulo'));
    }

    /**
     * @Route("/acervo/trabalho/{trabalho}", name="trabalho")
     */
    public function trabalho(Trabalho $trabalho): Response
    {
        return $this->render('@App/Acervo/trabalho.html.twig', compact('trabalho'));
    }


    /**
     * @Route("/acervo/linha-pesquisa", name="lista_linhas_pesquisa")
     */
    public function linhasPesquisaAction(): Response
    {
        $linhasPesquisa = $this->getDoctrine()->getRepository(LinhaPesquisa::class)->findAll();

        return $this->render('AppBundle:Acervo:linhas_pesquisa.html.twig', compact('linhasPesquisa'));
    }

    /**
     * @Route("/acervo/linha-pesquisa/{linhaPesquisa}", name="trabalhos_por_linha_pesquisa")
     */
    public function trabalhosPorLinhaPesquisaAction(LinhaPesquisa $linhaPesquisa): Response
    {
        $trabalhos = $linhaPesquisa->getTrabalhos();
        $titulo = 'Trabalhos da linha ' . $linhaPesquisa->getDescricao();

        return $this->render('@App/Acervo/trabalhos.html.twig', compact('trabalhos', 'titulo'));
    }

    /**
     * @Route("/acervo/orientador", name="lista_orientadores")
     */
    public function orientadoresAction(): Response
    {
        $orientadores = $this->getDoctrine()->getRepository(Orientador::class)->findAll();

        return $this->render('@App/Acervo/orientadores.html.twig', compact('orientadores'));
    }

    /**
     * @Route("/acervo/orientador/{orientador}", name="trabalhos_por_orientador")
     */
    public function trabalhosPorOrientadorAction(Orientador $orientador): Response
    {
        $trabalhos = $this->getDoctrine()->getRepository(Trabalho::class)
            ->findBy(['orientador' => $orientador]);
        $titulo = 'Trabalhos orientados por ' . $orientador->getNome();

        return $this->render('@App/Acervo/trabalhos.html.twig', compact('trabalhos', 'titulo'));
    }

    /**
     * @Route("/acervo/autor", name="lista_autores")
     */
    public function autoresAction(): Response
    {
        $autores = $this->getDoctrine()->getRepository(Autor::class)->findAll();

        return $this->render('@App/Acervo/autores.html.twig', compact('autores'));
    }

    /**
     * @Route("/acervo/autor/{autor}", name="trabalhos_por_autor")
     */
    public function trabalhosPorAutorAction(Autor $autor): Response
    {
        $trabalhos = $this->getDoctrine()->getRepository(Trabalho::class)
            ->findBy(['autor' => $autor]);
        $titulo = 'Trabalhos do autor ' . $autor->getNome();

        return $this->render('@App/Acervo/trabalhos.html.twig', compact('trabalhos', 'titulo'));
    }
}
