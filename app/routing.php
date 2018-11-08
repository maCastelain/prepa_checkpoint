<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @category Config
 * @package  Config
 * @author   WCS <contact@wildcodeschool.fr>
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Default' => [ // Controller
        ['index', '/', 'GET'] // action, url, method
    ],
    'Magasins' => [ // Controller
        ['add', '/add', ['GET', 'POST']], // action, url, method
        ['delete', '/magasin/delete/{id}', ['GET', 'POST']], // action, url, method
        ['edit', '/magasin/edit/{id}', ['GET', 'POST']], // action, url, method
    ],
    'Steaf' => [ // Controller
        ['index', '/staff', ['GET', 'POST']], // action, url, method
        ['userAdd', '/user/add', ['GET', 'POST']], // action, url, method
        ['userEdit', '/user/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['userDelete', '/user/delete/{id:\d+}', ['GET']] // action, url, method
    ]
];
