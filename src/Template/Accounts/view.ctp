<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business $business
 */
?>
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
            <a class="navbar-brand" href="#pablo"><?= __('Account') ?></a>
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
                    <?= ''// $this->Html->link(__('<i class="fas fa-plus"></i> New Plant'), ['action' => 'add'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
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
                        <h4 class="card-title"><?= __('Business Account') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-horizontal table-hover">
                                <tr>
                                    <th scope="row"><?= __('Business Name') ?></th>
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
                                    <th scope="row"><?= __('Account Created') ?></th>
                                    <td><?= h($business->created) ?></td>
                                </tr>
                            </table>


                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="card-title"><?= __('Account Users') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php if (!empty($business->users)): ?>
                                <table class="table table-striped">
                                    <tr>
                                        <th scope="col"><?= __('Username') ?></th>
                                        <th scope="col"><?= __('Role') ?></th>
                                        <th scope="col" class="text-right"><?= __('Created') ?></th>
                                    </tr>
                                    <?php foreach ($business->users as $users): ?>
                                        <tr>
                                            <td><?= $this->Html->link(h($users->username), ['controller' => 'Accounts', 'action' => 'view_user', $users->id]) ?></td>
                                            <td><?= $userRoles[$users->role]['name'] ?></td>
                                            <td class="text-right"><?= h($users->created) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php else: ?>
                                <div>No users associated with this business. THIS IS A PROBLEM!</div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


