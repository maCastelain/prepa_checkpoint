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
        $magasins = $magasinsManager->selectAll();
        $magasinsReplace = $this->replace($magasins);
        ?><pre><?php var_dump($magasinsReplace); ?></pre> <?php
        die();

        return $this->twig->render('index.html.twig', ['magasins' => $magasinsReplace]); // retourne la vue
    }

    public function replace($magasins)
    {
        foreach ($magasins as $magasin)
        {
            $nameMagasin = "";
            $replace = $magasin->getContent();

            $name = explode(" ", $replace);

            foreach ($name as $magasinName)
            {
                str_replace(" ", "", $magasinName);
                $nameMagasin .= $magasinName . " ";
            }
            $magasin->setContent($nameMagasin);
        }
        return $magasins;
    }

}

/*        $userManager = new UserManager($this->getPdo()); // new object
        $users = $userManager->selectAll(); // sélectionne tous les éléments
        foreach ($users as $user) // pour chaque élément on boucle dessus
            $user->getFirstname //get de la valeur désirée
                explode // balance dans la fonction remplacante de ltrim
            $user->setFirstname */