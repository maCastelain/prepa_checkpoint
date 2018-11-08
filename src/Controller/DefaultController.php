<?php

/**
 * DefaultController file
 *
 * PHP Version 7.2
 *
 * @category Controller
 * @package  Controller
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */

namespace Controller;

use Model\Magasins\Magasins;
use Model\Magasins\MagasinsManager;

/**
 * Class default controller.
 *
 * @category Controller
 * @package  Controller
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */
class DefaultController extends AbstractController
{
    /**
     * Displaying home page
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @return string The rendered template
     */
    public function index()
    {
        $magasinsManager = new MagasinsManager($this->getPdo());
        $magasins = $magasinsManager->selectAll(); // je select tout les magasins
        $magasinsReplace = $this->replace($magasins); // j'envoie tout les magasins dans ma fonction

        return $this->twig->render('index.html.twig', ['magasins' => $magasinsReplace]); // retourne la vue
    }

    public function replace($allMagasins)
    {
        foreach ($allMagasins as $magasin) // je boucle sur chaque objet de mon tableau ( magasin )
        {
            $newContentMagasin = ""; // j'instancie à chaque fois une nouvelle string vide
            $replace = $magasin->getContent(); // je récupère le contenu de mon magasin

            $explode = explode(" ", $replace); // je divise la string en plusieurs variable dès qu'il y a un espace ( toutes ces variables sont socké dans un tableau )

            foreach ($explode as $variableExplode) // je boucle sur le tableau explode
            {
                if(!empty($variableExplode)) // si l'élément de mon tableau n'est pas vide alors
                    $newContentMagasin .= $variableExplode . " "; // j'ajoute cet élément avec un espace à ma string instancié au dessus
            }
            $magasin->setContent($newContentMagasin); // puis j'envoie cette string en tant que nouveau contenu de mon magasin
        }
        return $allMagasins;
    }

}