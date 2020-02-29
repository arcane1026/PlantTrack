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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h4 class="card-title display-4"></h4>
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
