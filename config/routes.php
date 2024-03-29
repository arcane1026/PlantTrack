<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/view-profile', ['controller' => 'Users', 'action' => 'view_profile']);
    $routes->connect('/edit-profile', ['controller' => 'Users', 'action' => 'edit_profile']);
    $routes->connect('/view-business', ['controller' => 'Businesses', 'action' => 'view_info']);
    $routes->connect('/edit-business', ['controller' => 'Businesses', 'action' => 'edit_info']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
    $routes->connect('/confirm-email/*', ['controller' => 'Users', 'action' => 'confirm_email']);
    $routes->connect('/resend-activation-email/*', ['controller' => 'Users', 'action' => 'resend_activation_email']);
    $routes->connect('/change-password', ['controller' => 'Users', 'action' => 'change_password']);
    $routes->connect('/generate-qr-code/*', ['controller' => 'Batches', 'action' => 'qr_code']);

    $routes->connect('/employee-manager', ['controller' => 'Users', 'action' => 'manage']);

    $routes->connect('/promote/*', ['controller' => 'Users', 'action' => 'promote']);
    $routes->connect('/demote/*', ['controller' => 'Users', 'action' => 'demote']);
    $routes->connect('/change-owner', ['controller' => 'Users', 'action' => 'change_owner']);
    $routes->connect('/view-batch/*', ['controller' => 'Batches', 'action' => 'view']);
    $routes->connect('/timeline/*', ['controller' => 'Batches', 'action' => 'timeline']);
    $routes->connect('/add-note', ['controller' => 'Batches', 'action' => 'add_note']);
    $routes->connect('/add-reading', ['controller' => 'Batches', 'action' => 'add_reading']);
    $routes->connect('/edit-note/*', ['controller' => 'Batches', 'action' => 'edit_note']);
    $routes->connect('/edit-reading/*', ['controller' => 'Batches', 'action' => 'edit_reading']);
    $routes->connect('/delete-note/*', ['controller' => 'Batches', 'action' => 'delete_note']);
    $routes->connect('/delete-reading/*', ['controller' => 'Batches', 'action' => 'delete_reading']);


    /* DEBUG ROUTE */
    $routes->connect('/debug-gen-users', ['controller' => 'Users', 'action' => 'debug_gen_users']);

    $routes->connect('/accept-invite/*', ['controller' => 'Users', 'action' => 'invite_Employee_2']);
    $routes->connect('/invite', ['controller' => 'Users', 'action' => 'invite_Employee']);


    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
