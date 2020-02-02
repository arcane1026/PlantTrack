<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="wrapper wrapper-full-page">
    <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('http://static.coastlineapplications.com/plant_track/plant_bg.jpeg')">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <div class="card-header card-header-olive text-center">
                            <h4 class="card-title text-cream text-shadow-cream-on-olive">Plant Track</h4>
                        </div>
                        <h3 class="text-cream text-center">Register: User Account</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-rose">
                                            <i class="fas fa-hand-holding-seedling text-olive"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title text-cream ">Growth Profiles</h4>
                                            <p class="description text-cream ">
                                                Growth Profiles let you tweak your growth cycles to grow the best plants again and again.
                                            </p>
                                        </div>
                                        <div class="icon icon-rose">
                                            <i class="fal fa-qrcode text-olive"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title text-cream ">QR Code Tracking</h4>
                                            <p class="description text-cream ">
                                                Track each batch of plants via QR codes that retain detailed information about your plants.
                                            </p>
                                        </div>
                                        <div class="icon icon-rose">
                                            <i class="fas fa-flask text-olive"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title text-cream ">Testing Results</h4>
                                            <p class="description text-cream ">
                                                View testing results from each batch of plants you grow. Analyze the results to determine immediate remedies to failed results.
                                            </p>
                                        </div>
                                        <div class="icon icon-rose">
                                            <i class="fas fa-analytics text-olive"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title text-cream ">Reports</h4>
                                            <p class="description text-cream ">
                                                Is relative yield increasing or decreasing over time? Generate reports providing detailed insights into your grow operation.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 mr-auto">
                                    <!--<form class="form" method="" action="">-->
                                    <?= $this->Form->create(false, ['class' =>null]) ?>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['username'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Username *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('username', ['required' => true, 'label' => false, 'class' => 'form-control text-cream']); ?>
                                        <?php if (!empty($errors['username'])): foreach ($errors['username'] as $error): ?>
                                            <label id="exampleEmail-error" class="error" for="exampleEmail"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['password'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Password *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('password', ['required' => true, 'label' => false, 'class' => 'form-control text-cream', 'type' => 'password']) ?>
                                        <?php if (!empty($errors['password'])): foreach ($errors['password'] as $error): ?>
                                            <label id="exampleEmail-error" class="error" for="exampleEmail"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['repeat_password'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Repeat Password *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('repeat_password', ['required' => true, 'equalTo' => '#password', 'label' => false, 'class' => 'form-control text-cream', 'type' => 'password']) ?>
                                        <?php if (!empty($errors['repeat_password'])): foreach ($errors['repeat_password'] as $error): ?>
                                            <label id="exampleEmail-error" class="error" for="exampleEmail"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['first_name'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">First Name *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('first_name', ['required' => true, 'label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['first_name'])): foreach ($errors['first_name'] as $error): ?>
                                            <label id="exampleEmail-error" class="error" for="exampleEmail"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['last_name'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Last Name *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('last_name', ['required' => true, 'label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['last_name'])): foreach ($errors['last_name'] as $error): ?>
                                            <label id="exampleEmail-error" class="error" for="exampleEmail"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['email'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Email *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('email', ['required' => true, 'email' => true, 'label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['email'])): foreach ($errors['email'] as $error): ?>
                                            <label id="exampleEmail-error" class="error" for="exampleEmail"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['phone'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Phone *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('phone', ['required' => true, 'minLength' => '10', 'maxLength' => '10', 'label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['phone'])): foreach ($errors['phone'] as $error): ?>
                                            <label id="exampleEmail-error" class="error" for="exampleEmail"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <!--<input class="form-check-input" type="checkbox" value="accept_terms" >-->
                                                <?= $this->Form->control('agreement', ['required' => true, 'label' => false, 'class' => 'form-check-input', 'type' => 'checkbox', 'value' => 1]) ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                I agree to the
                                                <a href="#something">terms and conditions</a>.
                                            </label>
                                            <?php if (!empty($errors['agreement'])): foreach ($errors['agreement'] as $error): ?>
                                                <label id="agreement-error" class="error" for="agreement"><?= $error ?></label>
                                            <?php endforeach; endif; ?>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <?= $this->Flash->render() // Render flash message if one is set.?>
                                    </div>
                                    <div class="text-center">
                                        <?= $this->Form->button('Register <i class="fas fa-sign-up hvr-icon"></i>', ['class' => 'btn btn-primary btn-round mt-4', 'escape' => false, 'value' => 'step2']) ?>
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
