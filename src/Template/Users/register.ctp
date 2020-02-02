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
                        <h3 class="text-cream text-center">Register: Business Account</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-rose text-olive">
                                            <i class="fas fa-fw fa-user-crown"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title text-cream ">Owner Registration Only</h4>
                                            <p class="description text-cream ">
                                                <b><i>In order to register a new Plant Track account, you must be the owner or authorized representative of a business or organization.</i></b>
                                            </p>
                                            <p class="description text-cream">If this is the case, please continue with the registration form.</p>
                                        </div>
                                        <div class="icon icon-rose text-olive">
                                            <i class="fas fa-fw fa-users"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title text-cream ">For Employees</h4>
                                            <p class="description text-cream ">If you are an employee of a business already using Plant Track, please contact your employer for your account information.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 mr-auto">
                                    <!--<form class="form" method="" action="">-->
                                    <?= $this->Form->create(false, ['class' =>null]) ?>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['name'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Business Name *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('name', ['required' => true, 'label' => false, 'class' => 'form-control text-cream']); ?>
                                        <?php if (!empty($errors['name'])): foreach ($errors['name'] as $error): ?>
                                            <label id="name-error" class="error" for="name"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['street'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Street *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('street', ['required' => true, 'label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['street'])): foreach ($errors['street'] as $error): ?>
                                            <label id="street-error" class="error" for="street"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['street2'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Street Line 2</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('street2', ['label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['street2'])): foreach ($errors['street2'] as $error): ?>
                                            <label id="street2-error" class="error" for="street2"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['city'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">City *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('city', ['required' => true, 'label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['city'])): foreach ($errors['city'] as $error): ?>
                                            <label id="city-error" class="error" for="city"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['state'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">State *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('state', ['required' => true, 'minLength' => 2, 'maxLength' => 2, 'label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['state'])): foreach ($errors['state'] as $error): ?>
                                            <label id="state-error" class="error" for="state"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group<?= (!empty($errors['zip'])) ? ' has-danger' : '' ; ?>">
                                        <label for="exampleEmail" class="bmd-label-floating">Zip Code *</label>
                                        <!--<input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true" aria-invalid="true">-->
                                        <?= $this->Form->control('zip', ['required' => true, 'minLength' => 5, 'maxLength' => 5, 'number' => 'true', 'label' => false, 'class' => 'form-control text-cream']) ?>
                                        <?php if (!empty($errors['zip'])): foreach ($errors['zip'] as $error): ?>
                                            <label id="zip-error" class="error" for="zip"><?= $error ?></label>
                                        <?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <!--<input class="form-check-input" type="checkbox" value="authorized_owner" >-->
                                                <?= $this->Form->control('authorized', ['label' => false, 'class' => 'form-check-input', 'type' => 'checkbox', 'value' => 1]) ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                I certify that I am an authorized representative of this business.
                                            </label>
                                            <?php if (!empty($errors['authorized'])): foreach ($errors['authorized'] as $error): ?>
                                                <label id="authorized-error" class="error" for="authorized"><?= $error ?></label>
                                            <?php endforeach; endif; ?>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <?= $this->Flash->render() // Render flash message if one is set.?>
                                    </div>
                                    <div class="text-center">
                                        <?= $this->Form->button('Continue <i class="fas fa-arrow-right hvr-icon"></i>', ['class' => 'btn btn-primary btn-round mt-4', 'escape' => false, 'value' => 'step1', 'type' => 'submit', 'name' => 'step1']) ?>
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
