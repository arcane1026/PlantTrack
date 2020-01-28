<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard PRO by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/demo/demo.css" rel="stylesheet" />
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-user-plus"></i> Register'), ['controller' => 'Users', 'action' => 'register'], ['class' => 'nav-link', 'escape' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-id-badge"></i> Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link', 'escape' => false]) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page">
    <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('http://static.coastlineapplications.com/plant_track/plant_bg.jpeg')">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <div class="card-header card-header-olive text-center">
                            <h4 class="card-title text-cream text-shadow-cream-on-olive">Plant Track</h4>
                        </div>
                        <h3 class="text-cream text-center">Register</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-rose">
                                            <i class="fas fa-user-crown"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title text-cream ">Owner Registration Only</h4>
                                            <p class="description text-cream ">
                                                In order to create a new Plant Track account, you must be the owner or authorized representative of a business or organization.
                                            </p>
                                            <p class="description text-cream ">If you are an employee of a business already using Plant Track, please contact your employer for your account information.</p>
                                        </div>
                                    </div>
<!--
                                    <li class="row">
                                        <?= $this->Form->control('street', ['placeholder' => 'Street', 'label' => false, 'class' => 'form-control']) ?>
                                        <?php if (!empty($errors['street'])): foreach ($errors['street'] as $error): ?>
                                            <div class="error"><?= $error ?></div>
                                        <?php endforeach; endif; ?>
                                    </li>
                                    <li class="row">
                                        <?= $this->Form->control('street2', ['placeholder' => '(optional)', 'label' => false, 'class' => 'form-control']) ?>
                                        <?php if (!empty($errors['street2'])): foreach ($errors['street2'] as $error): ?>
                                            <div class="error"><?= $error ?></div>
                                        <?php endforeach; endif; ?>
                                    </li>
                                    <li class="row">
                                        <?= $this->Form->control('city', ['placeholder' => 'City', 'label' => false, 'class' => 'form-control']) ?>
                                        <?php if (!empty($errors['city'])): foreach ($errors['city'] as $error): ?>
                                            <div class="error"><?= $error ?></div>
                                        <?php endforeach; endif; ?>
                                    </li>
                                    <li class="row">
                                        <?= $this->Form->control('state', ['placeholder' => 'State', 'label' => false, 'class' => 'form-control']) ?>
                                        <?php if (!empty($errors['state'])): foreach ($errors['state'] as $error): ?>
                                            <div class="error"><?= $error ?></div>
                                        <?php endforeach; endif; ?>
                                    </li>
                                    <li class="row">
                                        <?= $this->Form->control('zip', ['placeholder' => 'Zip Code', 'label' => false, 'class' => 'form-control']) ?>
                                        <?php if (!empty($errors['zip'])): foreach ($errors['zip'] as $error): ?>
                                            <div class="error"><?= $error ?></div>
                                        <?php endforeach; endif; ?>
                                    </li>
                                    <li class="row">
                                        <?= $this->Flash->render() // Render flash message if one is set.?>
                                    </li> -->
                                </div>
                                <div class="col-md-5 mr-auto">
                                    <!--<form class="form" method="" action="">-->
                                        <?= $this->Form->create(false, ['class' =>null]) ?>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                      <i class="fas fa-fw"></i>
                                                    </span>
                                                </div>
                                                <?php if (!empty($errors['name'])): foreach ($errors['name'] as $error): ?>
                                                    <label for="" class="bmd-label-floating"><?= $error ?></label>
                                                <?php endforeach; endif; ?>
                                                <?= $this->Form->control('name', ['placeholder' => 'Business Name', 'label' => false, 'class' => 'form-control text-cream']); ?>
                                                <?php if (!empty($errors['name'])): foreach ($errors['name'] as $error): ?>
                                                    <span class="form-control-feedback">
                                                        <i class="fas fa-fw fa-times text-cream" style="font-size: 20px;"></i>
                                                    </span>
                                                <?php endforeach; endif; ?>


                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                      <i class="fas fa-fw"></i>
                                                    </span>
                                                </div>
                                                <?= $this->Form->control('street', ['placeholder' => 'Street', 'label' => false, 'class' => 'form-control']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                      <i class="fas fa-fw"></i>
                                                    </span>
                                                </div>
                                                <?= $this->Form->control('street2', ['placeholder' => '(optional)', 'label' => false, 'class' => 'form-control']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                      <i class="fas fa-fw"></i>
                                                    </span>
                                                </div>
                                                <?= $this->Form->control('city', ['placeholder' => 'City', 'label' => false, 'class' => 'form-control']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                      <i class="fas fa-fw"></i>
                                                    </span>
                                                </div>
                                                <?= $this->Form->control('state', ['placeholder' => 'State', 'label' => false, 'class' => 'form-control']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group has-default">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                      <i class="fas fa-fw"></i>
                                                    </span>
                                                </div>
                                                <?= $this->Form->control('zip', ['placeholder' => 'Zip Code', 'label' => false, 'class' => 'form-control']) ?>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="authorized_owner" >
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                I certify that I am an authorized representative of this business.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="accept_terms" >
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                I agree to the
                                                <a href="#something">terms and conditions</a>.
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <?= $this->Flash->render() // Render flash message if one is set.?>
                                        </div>
                                        <div class="text-center">
                                            <?= $this->Form->button('Continue <i class="fas fa-arrow-right hvr-icon"></i>', ['class' => 'btn btn-primary btn-round mt-4', 'escape' => false, 'value' => 'step1']) ?>
                                            <!--<a href="#pablo" class="btn btn-primary btn-round mt-4">Continue...</a>-->
                                        </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
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
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy; <?= date('Y') ?> PlantTrack, made with <i class="fas fa-heart"></i> in the USA. <i class="fas fa-flag-usa"></i>
                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
    });
</script>
</body>

</html>
<!--
<div id="root" class="full-screen-background single-panel-centered img-background">
    <div class="panel">
        <?= $this->Form->create() ?>
            <ul>
                <li>
                    <h1>PlantTrack</h1>
                    <h2>Registration</h2>
                    <p>In order to create a new Plant Track account, you must be the owner or authorized representative of a business or organization. If this is the case please continue with registration below.</p>
                    <p>If you are an employee of a business already using Plant Track, please contact your employer for your account information.</p>
                </li>
                <li class="row">
                    <?= $this->Flash->render() // Render flash message if one is set.?>
                </li>
                <li class="row">
                    <?= $this->Form->button('Continue to Registration <i class="fas fa-arrow-right hvr-icon"></i>', ['class' => 'hvr-icon-pulse', 'escape' => false, 'value' => 'step1']) ?>
                </li>
                <li class="row">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-arrow-left hvr-icon"></i> Sign In Instead'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'button hvr-icon-pulse', 'escape' => false]) ?>
                </li>
            </ul>
        <?= $this->Form->end() ?>
    </div>
</div>
-->
