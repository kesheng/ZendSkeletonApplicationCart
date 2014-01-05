<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
            'Album\Controller\Cart' => 'Album\Controller\CartController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album[/][:action][/:id]',
                    'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            ),
            'cart' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/cart',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Cart',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/add',
                            'defaults' => array(
                                'controller' => 'Album\Controller\Cart',
                                'action'     => 'add',
                            ),
                        ),
                    ),
                    'cart' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/cart',
                            'defaults' => array(
                                'controller' => 'Album\Controller\Cart',
                                'action'     => 'cart',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'scn-social-auth/user/login' => __DIR__ . '/../view/scn-social-auth/user/login.phtml',
            'scn-social-auth/user/register' => __DIR__ . '/../view/scn-social-auth/user/register.phtml',
        ),
    ),
);