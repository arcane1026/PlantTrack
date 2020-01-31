<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
            <a class="navbar-brand" href="#pablo"><?= __('User Profile') ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="form-inline">
                    <?= $this->Html->link(__('<i class="fas fa-user-shield"></i> Change Password'), ['action' => 'change-password'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
                    <?= $this->Html->link(__('<i class="fas fa-user-edit"></i> Edit Profile'), ['action' => 'edit-profile'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
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
                            <i class="fas fa-user"></i> <?= __('User Profile') ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3>Account Details</h3>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="row"><?= __('Username') ?></th>
                                    <td ><?= h($user->username) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Business') ?></th>
                                    <td><?= $user->has('business') ? $this->Html->link($user->business->name, ['controller' => 'Accounts', 'action' => 'view', $user->business->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Role') ?></th>
                                    <td><?= $userRoles[$user->role]['name'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Account Created') ?></th>
                                    <td><?= h($user->created) ?></td>
                                </tr>
                                <?php if ($activeUser['role'] === 3): ?>
                                <tr>
                                    <th scope="row"><?= __('Confirmed') ?></th>
                                    <td><?= $user->confirmed ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Locked') ?></th>
                                    <td><?= $user->locked ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'; ?></td>
                                </tr>
                                <?php endif; ?>
                            </table>
                            <h3>Personal Information</h3>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="row"><?= __('First Name') ?></th>
                                    <td><?= h($user->first_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Last Name') ?></th>
                                    <td><?= h($user->last_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Email') ?></th>
                                    <td><?= h($user->email) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Phone') ?></th>
                                    <td><?= h($user->phone) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Resource Path') ?></th>
                                    <td><?= h($user->resource_path) ?></td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
