<?php

/**
 * UserController file
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
 * User class controller.
 *
 * @category Controller
 * @package  Controller
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */

class MagasinsController extends AbstractController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $content = $_POST['content'];

            $magasin = new Magasins();
            $magasin->setName($name);
            $magasin->setContent($content);
            $magasinsManager = new MagasinsManager($this->getPdo());
            $magasinsManager->add($magasin);
        }
        return $this->twig->render('Magasins/add.html.twig');
    }

    public function delete($id)
    {
        $magasins = new MagasinsManager($this->getPdo());
        $magasins->delete($id);

        header('Location: /');
    }

    public function edit($id)
    {
        $magasinsManager = new MagasinsManager($this->getPdo());
        $magasinID = $magasinsManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idSelect = $_POST['id'];
            $name = $_POST['name'];
            $content = $_POST['content'];

            $magasin = new Magasins();
            $magasin->setId($idSelect);
            $magasin->setName($name);
            $magasin->setContent($content);
            $magasinsManager = new MagasinsManager($this->getPdo());
            $magasinsManager->edit($magasin);

            header('Location: /');
        }
        return $this->twig->render('Magasins/edit.html.twig', ['magasin' => $magasinID]);
    }
}
