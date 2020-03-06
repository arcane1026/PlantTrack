<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">

        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <?= $this->Flash->render(); ?>
        <?php if ($plants === 0 || $batches === 0 || $growthProfiles === 0): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h4 class="card-title">Getting Started</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center font-italic">Follow the steps below to get started using PlantTrack.</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-<?= ($plants === 0) ? 'danger' : 'success' ?>">
                                        <div class="card-icon">
                                            <i class="fas fa-<?= ($plants === 0) ? 'ban' : 'check' ?>"></i>
                                        </div>
                                        <h4 class="card-title font-weight-bold">Step 1</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($plants === 0): ?>
                                            <div>
                                                <p class="font-weight-bold h5">You have no plants.</p>
                                                <p class="font-weight-bold">The first step to using PlantTrack is to create the different types of plants that your business grows. This way when you track a batch it will know what type of plant the batch is.</p>
                                                <p class="font-weight-bold"><?= $this->Html->link(__('Click Here'), ['controller' => 'Plants', 'action' => 'add']) ?> to create your first plant.</p>
                                            </div>
                                        <?php else: ?>
                                            <div>
                                                <p class="font-weight-bold h5">You have <?= ($plants > 1) ? 'plants' : 'a plant' ?>.</p>
                                                <p class="font-weight-bold">Continue on with the remaining steps.</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-header-<?= ($growthProfiles === 0) ? 'danger' : 'success' ?> card-header-icon">
                                        <div class="card-icon">
                                            <i class="fas fa-<?= ($growthProfiles === 0) ? 'ban' : 'check' ?>"></i>
                                        </div>
                                        <h4 class="card-title font-weight-bold">Step 2</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($growthProfiles === 0): ?>
                                            <div>
                                                <p class="font-weight-bold h5">You have no growth profiles.</p>
                                                <p class="font-weight-bold">Before you can start creating batches, you must also create a growth profile. This allows you to create a virtual layout of your production line and watch as batches of plants move through it as they grow.</p>
                                                <p class="font-weight-bold"><?= $this->Html->link(__('Click Here'), ['controller' => 'GrowthProfiles', 'action' => 'add']) ?> to create your first growth profile.</p>
                                            </div>
                                        <?php else: ?>
                                            <div>
                                                <p class="font-weight-bold h5">You have <?= ($growthProfiles > 1) ? 'growth profiles' : 'a growth profile' ?>.</p>
                                                <p class="font-weight-bold">Continue on with the remaining steps.</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-header-<?= ($batches === 0) ? 'danger' : 'success' ?> card-header-icon">
                                        <div class="card-icon">
                                            <i class="fas fa-<?= ($batches === 0) ? 'ban' : 'check' ?>"></i>
                                        </div>
                                        <h4 class="card-title font-weight-bold">Step 3</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($batches === 0): ?>
                                            <div>
                                                <p class="font-weight-bold h5">You have no batches.</p>
                                                <p class="font-weight-bold">Once you've created your plants and growth profiles, you can start using PlantTrack to track your batches of plants. These are how PlantTrack keeps track of the plants you're growing</p>
                                                <p class="font-weight-bold"><?= $this->Html->link(__('Click Here'), ['controller' => 'Batches', 'action' => 'add'], []) ?> to create your first batch.</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h4 class="card-title">Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title display-4">Welcome, <?= $activeUser['first_name'] . ' ' . $activeUser['last_name'] ?></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-horizontal table-hover text-nowrap">
                                        <tbody>
                                        <tr>
                                            <th>Username</th>
                                            <td><?= $activeUser['username'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Role</th>
                                            <td><?= $userRoles[$activeUser['role']]['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Last Login</th>
                                            <td><?= (!empty($lastLoginDate) && !empty($lastLoginIp)) ? $lastLoginDate . ' from ' . $lastLoginIp : 'No previous login data.' ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
