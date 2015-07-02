<?php

/**

 * Zend Framework (http://framework.zend.com/)

 *

 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository

 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)

 * @license   http://framework.zend.com/license/new-bsd New BSD License

 */



return array(

    'router' => array(

        'routes' => array(

            'instagram' => array(

                 'type'    => 'Segment',

                 'options' => array(

                     'route'    => '/instagram[/:action][/:id][/:page]',

                     'constraints' => array(

                         'action' => '[a-zA-Z.][a-zA-Z0-9._-]*',

                         'id'     => '[0-9a-zA-Z.][a-zA-Z0-9._-]*',

                         'page'   => '[a-zA-Z][a-zA-Z0-9_-]*',

                     ),

                     'defaults' => array(

                         'controller' => 'instagram',

                         'action'     => 'index',

                     ),

                 ),

             ),

         ),

     ),

    'controllers' => array(

        'invokables' => array(

            'instagram' => 'Instagram\Controller\InstagramController'

        ),

    ),

    'view_manager' => array(

        'template_path_stack' => array(

            __DIR__ . '/../view',

        ),

    ),

);

