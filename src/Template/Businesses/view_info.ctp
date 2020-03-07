<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business $business
 */
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo"><?= __('Business Information') ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form"></form> <?php // FORM MUST EXIST FOR UI TO WORK ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link(__('<i class="fas fa-edit"></i>'), ['action' => 'edit_info'], ['escape' => false, 'class' => 'btn btn-sm btn-rose btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Edit Business']) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<div class="content">
    <div class="container-fluid">
        <?= $this->Flash->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4 class="card-title"><?= __('Business Details') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-horizontal">
                                <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= h($business->name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Street') ?></th>
                                    <td><?= h($business->street) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Street2') ?></th>
                                    <td><?= h($business->street2) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('City') ?></th>
                                    <td><?= h($business->city) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('State') ?></th>
                                    <td><?= h($business->state) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Zip') ?></th>
                                    <td><?= h($business->zip) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created') ?></th>
                                    <td><?= h($business->created) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
