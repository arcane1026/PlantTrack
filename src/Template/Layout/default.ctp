<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/pt/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/pt/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        PlantTrack
    </title>
    <?= $this->Html->meta('icon') ?>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Playball|Salsa&display=swap') // Google Fonts ?>
    <?= $this->Html->css('font-awesome-pro.min.css') // Font Awesome ?>
    <?= $this->Html->css('jquery-ui.min.css') // Jquery UI ?>
    <?= $this->Html->css('jquery-ui.structure.min.css') // Jquery UI Structure ?>
    <?= $this->Html->css('jquery-ui.theme.min.css') // Jquery UI Theme ?>
    <?= $this->Html->css('material-dashboard.min.css') // Material Dashboard ?>
    <?= $this->Html->css('global.css') // Global Application CSS ?>
    <?= $this->Html->css('default.css') // Default Layout CSS ?>

    <?= $this->Html->script('core/jquery.min.js') . PHP_EOL ?>
    <?= $this->Html->script('jquery-ui.min.js') . PHP_EOL ?>
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black">
        <div class="logo">
            <?= $this->Html->link(__('<div></div>'), ['controller' => 'Dashboard', 'action' => 'index'], ['escape' => false, 'class' => 'simple-text logo-mini']) ?>
            <?= $this->Html->link(__('PlantTrack'), ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'simple-text logo-normal']) ?>
        </div>
        <div class="sidebar-wrapper">
            <div class="user<?= ($activePrimaryNav === 'Users') ? ' active' : ''?>">
                <div class="photo">
                    <!--<img src="../assets/img/faces/avatar.jpg" />-->
                    <i class="fas fa-user-circle" style="font-size: 32px; color: #eee"></i>
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#userCollapse" class="username">
                        <span>
                            <?= $activeUser['username'] ?? 'NOT SIGNED IN' ?>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="collapse" id="userCollapse">
                        <ul class="nav">
                            <li class="nav-item">
                                <?= $this->Html->link(__('<span class="sidebar-mini"> <i class="fal fa-fw fa-user"></i> </span><span class="sidebar-normal"> My Profile </span>'), ['controller' => 'Users', 'action' => 'view_profile'], ['escape' => false, 'class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(__('<span class="sidebar-mini"> <i class="fal fa-fw fa-user-edit"></i> </span><span class="sidebar-normal"> Edit Profile </span>'), ['controller' => 'Users', 'action' => 'edit_profile'], ['escape' => false, 'class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(__('<span class="sidebar-mini"> <i class="fal fa-fw fa-user-cog"></i> </span><span class="sidebar-normal"> User Settings </span>'), ['controller' => 'Users', 'action' => 'settings'], ['escape' => false, 'class' => 'nav-link']) ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(__('<span class="sidebar-mini"> <i class="fal fa-fw fa-sign-out-alt"></i> </span><span class="sidebar-normal"> Sign Out </span>'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, 'class' => 'nav-link']) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?= (isset($activeUser['role'])) ? $this->element('sidebar_' . $activeUser['role']) : 'No Sidebar Loaded' ?>
        </div>
        <div class="sidebar-background" style="background-image: url(http://static.coastlineapplications.com/plant_track/plant_bg4.jpeg); background-position: 70% center; "></div>
    </div>

    <div class="main-panel">
        <?= $this->fetch('content') ?>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#exampleModal3">
                                Terms of Use
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="Swal.fire('<?= h($this->element('privacy_policy')); ?>')">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Get Help
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy; <?= date('Y') ?>, made with <i class="fas fa-heart"></i> in the USA. <i class="fas fa-flag-usa"></i>
                </div>
            </div>
        </footer>
    </div>
</div>

<!--   Core JS  -->
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
<?= $this->Html->script('material-dashboard.min.js') . PHP_EOL ?>


<script>


        $( ".sortable" ).sortable({
            handle: ".handle"
        });
        //md.initVectorMap();


    // Create a new line chart object where as first parameter we pass in a selector
    // that is resolving to our chart container element. The Second parameter
    // is the actual data object.
    if(typeof data !== 'undefined'){// if statement to avoid javascript errors on pages without charts
        new Chartist.Line('#chart1', data);
        new Chartist.Bar('#chart2', data, options);
        new Chartist.Pie('#chart3', data);
    }
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
