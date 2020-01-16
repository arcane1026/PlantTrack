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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Playball|Salsa&display=swap') // Google Fonts ?>
    <?= $this->Html->css('all.min.css') // Font Awesome ?>
    <?= '' // $this->Html->css('base.css') // CakePHP Built-in CSS Frameworks TODO: EVENTUALLY REMOVE ONCE OUR UI IS COMPLETE ?>
    <?= '' // $this->Html->css('style.css') // CakePHP Default CSS styling TODO: EVENTUALLY REMOVE ONCE OUR UI IS COMPLETE ?>
    <?= $this->Html->css('bootstrap.min.css') //  ?>
    <?= $this->Html->css('bootstrap-grid.min.css') //  ?>
    <?= $this->Html->css('bootstrap-reboot.min.css') //  ?>
    <?= $this->Html->css('default.css') // CSS specific to the default layout ?>

    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js') // jQuery library ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') // jQuery UI javascript ?>
    <?= $this->Html->script('popmotion.min.js') // Popmotion Javascript library ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/chart.js@2.8.0') ?>
    <?= $this->Html->script('default.js') // Javascript specific to the default layout ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div class="wrapper">

    <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="img/AdobeStock_249965164.jpeg">
        <!--
            Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
            Tip 2: you can also add an image using data-image tag
            Tip 3: you can change the color of the sidebar with data-background-color="white | black"
        -->

        <div class="logo">
            <?= $this->Html->link(__('<i class="fas fa-seedling"></i>'), ['controller' => 'Users', 'action' => 'dashboard'], ['escape' => false, '_full' => true, 'class' => 'simple-text logo-mini']) ?>
            <?= $this->Html->link(__('PlantTrack'), ['controller' => 'Users', 'action' => 'dashboard'], ['_full' => true, 'class' => 'simple-text logo-normal']) ?>
        </div>

        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <!--<img src="../assets/img/faces/avatar.jpg">-->
                    <i class="fas fa-user-circle" style="font-size: 34px; color: #9fa659;"></i>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span style="color: #9fa659;">
                             <?= $activeUser['username'] ?? 'NOT SIGNED IN' ?>
                            <i class="fas fa-caret-down caret" style="font-size: 30px; margin-top: -15px;"></i>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav flex-column list-unstyled">
                            <li>
                                <?= $this->Html->link(__('<span><i class="fal fa-fw fa-user"></i>View Profile</span>'), ['controller' => 'Users', 'action' => 'view', $activeUser['id']], ['escape' => false]) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('<span><i class="fal fa-fw fa-user-edit"></i>Edit Profile</span>'), ['controller' => 'Users', 'action' => 'edit', $activeUser['id']], ['escape' => false]) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('<span><i class="fal fa-fw fa-user-cog"></i>User Settings</span>'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('<span><i class="fal fa-fw fa-sign-out"></i>Sign Out</span>'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user">
                <div class="photo" style=" border-radius: 0px; padding: 5px 0 0 5px">
                    <!--<img src="../assets/img/faces/avatar.jpg">-->
                    <i class="fas fa-building" style="font-size: 24px; color: #9fa659;"></i>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#businessCollapse" class="collapsed">
                        <span style="color: #9fa659;">
                            Business
                            <i class="fas fa-caret-down caret" style="font-size: 30px; margin-top: -15px;"></i>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="businessCollapse">
                        <ul class="nav flex-column list-unstyled">
                            <li>
                                <?= $this->Html->link(__('<i class="fal fa-info-circle"></i>View Information'), ['controller' => 'Businesses', 'action' => 'view', $activeUser['business_id']], ['escape' => false ]) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('<i class="fal fa-edit"></i>Edit Information'), ['controller' => 'Businesses', 'action' => 'edit', $activeUser['business_id']], ['escape' => false ]) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('<i class="fal fa-users"></i>Manage Employees'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false ]) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('<i class="fal fa-cogs"></i>Application Settings'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false ]) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav user flex-column list-unstyled components">

                <li <?= ($activePrimaryNav === 'Dashboard') ? 'class="active"' : '' ?>>
                    <?= $this->Html->link(__('<i class="fas fa-tachometer-alt"></i><p>Dashboard</p>'), ['controller' => 'Users', 'action' => 'dashboard'], ['escape' => false ]) ?>
                </li>
                <li <?= ($activePrimaryNav === 'Batches') ? 'class="active"' : '' ?>>
                    <?= $this->Html->link(__('<i class="fas fa-box-full"></i><p>Batches</p>'), ['controller' => 'Batches', 'action' => 'index'], ['escape' => false ]) ?>
                </li>
                <li <?= ($activePrimaryNav === 'Testing') ? 'class="active"' : '' ?>>
                    <?= $this->Html->link(__('<i class="fas fa-flask"></i><p>Testing</p>'), ['controller' => 'Batches', 'action' => 'testing'], ['escape' => false ]) ?>
                </li>
                <li <?= ($activePrimaryNav === 'Reports') ? 'class="active"' : '' ?>>
                    <?= $this->Html->link(__('<i class="fas fa-analytics"></i><p>Reports</p>'), ['controller' => 'Reports', 'action' => 'index'], ['escape' => false ]) ?>
                </li>
            </ul>
            <ul class="nav flex-column list-unstyled components">

                <li <?= ($activePrimaryNav === 'GrowthProfiles') ? 'class="active"' : '' ?>>
                    <?= $this->Html->link(__('<i class="fas fa-hand-holding-seedling"></i><p>Growth Profiles</p>'), ['controller' => 'GrowthProfiles', 'action' => 'index'], ['escape' => false ]) ?>
                </li>
                <li <?= ($activePrimaryNav === 'Plants') ? 'class="active"' : '' ?>>
                    <?= $this->Html->link(__('<i class="fas fa-leaf"></i><p>Plants</p>'), ['controller' => 'Plants', 'action' => 'index'], ['escape' => false ]) ?>
                </li>
            </ul>
<!--
                <li>
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="material-icons">apps</i>
                        <p> Components
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="componentsExamples">
                        <ul class="nav">
                            <li>
                                <a href="./components/buttons.html">
                                    <span class="sidebar-mini"> B </span>
                                    <span class="sidebar-normal"> Buttons </span>
                                </a>
                            </li>
                            <li>
                                <a href="./components/grid.html">
                                    <span class="sidebar-mini"> GS </span>
                                    <span class="sidebar-normal"> Grid System </span>
                                </a>
                            </li>
                            <li>
                                <a href="./components/panels.html">
                                    <span class="sidebar-mini"> P </span>
                                    <span class="sidebar-normal"> Panels </span>
                                </a>
                            </li>
                            <li>
                                <a href="./components/sweet-alert.html">
                                    <span class="sidebar-mini"> SA </span>
                                    <span class="sidebar-normal"> Sweet Alert </span>
                                </a>
                            </li>
                            <li>
                                <a href="./components/notifications.html">
                                    <span class="sidebar-mini"> N </span>
                                    <span class="sidebar-normal"> Notifications </span>
                                </a>
                            </li>
                            <li>
                                <a href="./components/icons.html">
                                    <span class="sidebar-mini"> I </span>
                                    <span class="sidebar-normal"> Icons </span>
                                </a>
                            </li>
                            <li>
                                <a href="./components/typography.html">
                                    <span class="sidebar-mini"> T </span>
                                    <span class="sidebar-normal"> Typography </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#formsExamples" class="" aria-expanded="true">
                        <i class="material-icons">content_paste</i>
                        <p> Forms
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse in" id="formsExamples" aria-expanded="true" style="">
                        <ul class="nav">
                            <li>
                                <a href="./forms/regular.html">
                                    <span class="sidebar-mini"> RF </span>
                                    <span class="sidebar-normal"> Regular Forms </span>
                                </a>
                            </li>
                            <li>
                                <a href="./forms/extended.html">
                                    <span class="sidebar-mini"> EF </span>
                                    <span class="sidebar-normal"> Extended Forms </span>
                                </a>
                            </li>
                            <li>
                                <a href="./forms/validation.html">
                                    <span class="sidebar-mini"> VF </span>
                                    <span class="sidebar-normal"> Validation Forms </span>
                                </a>
                            </li>
                            <li>
                                <a href="./forms/wizard.html">
                                    <span class="sidebar-mini"> W </span>
                                    <span class="sidebar-normal"> Wizard </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#tablesExamples">
                        <i class="material-icons">grid_on</i>
                        <p> Tables
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="tablesExamples">
                        <ul class="nav">
                            <li>
                                <a href="./tables/regular.html">
                                    <span class="sidebar-mini"> RT </span>
                                    <span class="sidebar-normal"> Regular Tables </span>
                                </a>
                            </li>
                            <li>
                                <a href="./tables/extended.html">
                                    <span class="sidebar-mini"> ET </span>
                                    <span class="sidebar-normal"> Extended Tables </span>
                                </a>
                            </li>
                            <li>
                                <a href="./tables/datatables.net.html">
                                    <span class="sidebar-mini"> DT </span>
                                    <span class="sidebar-normal"> DataTables.net </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#mapsExamples">
                        <i class="material-icons">place</i>
                        <p> Maps
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="mapsExamples">
                        <ul class="nav">
                            <li>
                                <a href="./maps/google.html">
                                    <span class="sidebar-mini"> GM </span>
                                    <span class="sidebar-normal"> Google Maps </span>
                                </a>
                            </li>
                            <li>
                                <a href="./maps/fullscreen.html">
                                    <span class="sidebar-mini"> FSM </span>
                                    <span class="sidebar-normal"> Full Screen Map </span>
                                </a>
                            </li>
                            <li>
                                <a href="./maps/vector.html">
                                    <span class="sidebar-mini"> VM </span>
                                    <span class="sidebar-normal"> Vector Map </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="./widgets.html">
                        <i class="material-icons">widgets</i>
                        <p> Widgets </p>
                    </a>
                </li>

                <li>
                    <a href="./charts.html">
                        <i class="material-icons">timeline</i>
                        <p> Charts </p>
                    </a>
                </li>

                <li>
                    <a href="./calendar.html">
                        <i class="material-icons">date_range</i>
                        <p> Calendar </p>
                    </a>
                </li>

            </ul>-->
        </div>
        <div class="sidebar-background" style="background-image: url(http://static.coastlineapplications.com/plant_track/plant_bg4.jpeg); background-position: 70% center; "></div></div>

    <div class="main-panel">
        <?= $this->fetch('content') ?>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="<?= $webroot ?>">
                                <i class="fas fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="http://www.planttrackapp.com">
                                <i class="fas fa-building"></i>
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-info"></i>
                                Terms of Use
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-shield-alt"></i>
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-phone"></i>
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright float-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Plant Track
                </p>
            </div>
        </footer>

    </div>
</div>


<!--
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="<?= $webroot ?>"><i class="fal fa-seedling"></i> Plant Track<?php //echo $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><?= $this->Html->link(__('<i class="fas fa-user-circle"></i> ' . ($activeUser['username'] ?? 'NOT SIGNED IN') ), ['controller' => 'Users', 'action' => 'view', $activeUser['id'] ?? ''], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-sign-out"></i> Sign Out'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
            </ul>
            </ul>
        </div>
    </nav>
    <?= '' // $this->Flash->render() ?>
    <div class="container clearfix">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <ul class="side-nav">
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-tachometer-alt"></i> Dashboard'), ['controller' => 'Users', 'action' => 'dashboard'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-building"></i> Businesses'), ['controller' => 'Businesses', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-user"></i> Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-leaf"></i> Plants'), ['controller' => 'Plants', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-hand-holding-seedling"></i> Growth Profiles'), ['controller' => 'GrowthProfiles', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('Stages'), ['controller' => 'Stages', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('Steps'), ['controller' => 'Steps', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-box-full"></i> Batches'), ['controller' => 'Batches', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-flask"></i> Testing'), ['controller' => 'Batches', 'action' => 'testing'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-thermometer-quarter"></i> Readings'), ['controller' => 'Readings', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-comment-alt-lines"></i> Notes'), ['controller' => 'Notes', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-analytics"></i> Reports'), ['controller' => 'Reports', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-history"></i> Access Log'), ['controller' => 'AccessLog', 'action' => 'index'], ['escape' => false]) ?></li>
        </nav>
        <?= '' //$this->fetch('content') ?>
    </div>
    <footer>
    </footer> -->
</body>
</html>
