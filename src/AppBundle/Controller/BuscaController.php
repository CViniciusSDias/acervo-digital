<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trabalho;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Classe responsável por realizar a busca genérica textual por trabalhos
 * @package AppBundle\Controller
 */
class BuscaController extends Controller
{
    /**
     * @Route("/buscar", name="buscar_trabalhos")
     */
    public function buscarAction(Request $request): Response
    {
        $busca = $request->query->get('pesquisa');
        $trabalhos = $this->getDoctrine()->getRepository(Trabalho::class)->buscaGenerica($busca);
        $titulo = "Resultados da pesquisa para \"$busca\"";

        return $this->render('@App/Busca/buscar.html.twig', compact('trabalhos', 'titulo'));
    }
}
