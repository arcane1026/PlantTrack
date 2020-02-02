<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'PlantTrack';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?> -
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Playball|Salsa&display=swap') // Google Fonts ?>
    <?= $this->Html->css('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css') // jQuery UI css ?>
    <?= $this->Html->css('font-awesome-pro.min.css') // Font Awesome icons library ?>
    <?= $this->Html->css('material-dashboard.min.css') // Material Dashboard ?>
    <?= $this->Html->css('global.css') // Global Application CSS ?>
    <?= $this->Html->css('login.css') // Login page specific CSS ?>

    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js') // jQuery library ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') // jQuery UI javascript ?>
    <?= $this->Html->script('popmotion.min.js') // Popmotion Javascript library ?>
    <?= $this->Html->script('login.js') // Login page javascript ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="off-canvas-sidebar">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
        <div class="navbar-wrapper">
            <a href="http://www.planttrackapp.com" class="navbar-brand">
                <i class="fas fa-arrow-left"></i> Plant Track Website
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item<?= ($action === 'login') ? ' active' : ''?>">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-id-card-alt"></i> Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link', 'escape' => false]) ?>
                </li>
                <li class="nav-item<?= ($action === 'register') ? ' active' : ''?>">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-user-plus"></i> Register'), ['controller' => 'Users', 'action' => 'register'], ['class' => 'nav-link', 'escape' => false]) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
    <?= $this->fetch('content') ?>

    <!--   Core JS  -->
    <?= $this->Html->script('core/jquery.min.js') . PHP_EOL ?>
    <?= $this->Html->script('core/popper.min.js') . PHP_EOL ?>
    <?= $this->Html->script('core/bootstrap-material-design.min.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/perfect-scrollbar.jquery.min.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/moment.min.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/sweetalert2.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/jquery.validate.min.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/jquery.bootstrap-wizard.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/bootstrap-selectpicker.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/bootstrap-datetimepicker.min.js') . PHP_EOL  ?>
    <?= $this->Html->script('plugins/jquery.dataTables.min.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/bootstrap-tagsinput.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/jasny-bootstrap.min.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/fullcalendar.min.js') . PHP_EOL ?>
    <?= ''//$this->Html->script('plugins/jquery-jvectormap.js') . PHP_EOL  ?>
    <?= $this->Html->script('plugins/nouislider.min.js') . PHP_EOL ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/arrive.min.js') . PHP_EOL ?>
    <?= ''//$this->Html->script('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') . PHP_EOL ?>
    <?= $this->Html->script('plugins/chartist.min.js') . PHP_EOL ?>
    <?= $this->Html->script('plugins/bootstrap-notify.js') . PHP_EOL ?>
    <?= $this->Html->script('material-dashboard.min.js') . PHP_EOL ?>

    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
            md.initFormExtendedDatetimepickers();

            //md.initVectorMap();

        });
    </script>
</body>
</html>
<!--
 =========================================================
 Material Dashboard PRO - v2.1.0
 =========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard-pro
 Copyright 2019 Creative Tim (https://www.creative-tim.com)

 Coded by Creative Tim

 =========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
