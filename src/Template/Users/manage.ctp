<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
            <a class="navbar-brand" href="#pablo">Employee Manager</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <div class="form-inline">
                <?= $this->Html->link(__('<i class="fas fa-envelope"></i> Invite Employee'), ['action' => 'invite'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
                <?= $this->Html->link(__('<i class="fas fa-user-crown"></i> Change Business Owner'), ['action' => 'change_owner'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
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
                            <i class="fas fa-users-crown"></i>
                        </div>
                        <h4 class="card-title">Managers</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('resource_path') ?></th>
                                    <th scope="col" class="text-center"><?= __('Actions') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($managers as $manager): ?>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>

                                        <td><?= h($manager->username) ?></td>
                                        <td><?= h($manager->first_name) ?></td>
                                        <td><?= h($manager->last_name) ?></td>
                                        <td><?= h($manager->email) ?></td>
                                        <td><?= h($manager->phone) ?></td>
                                        <td><?= h($manager->resource_path) ?></td>
                                        <td class="text-center">
                                            <?= $this->Html->link('<i class="fas fa-arrow-from-top"></i> Demote', ['action' => 'demote', $manager->id], ['escape' => false, 'class' => 'btn btn-link']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5 text-sm-center">
                                <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">
                                    <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7 text-sm-center">
                                <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                                    <ul class="pagination">
                                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                        <?= $this->Paginator->numbers() ?>
                                        <?= $this->Paginator->next(__('next') . ' >') ?>
                                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                                    </ul>
                                </div>
                            </div>
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
                        <h4 class="card-title">Employees</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('resource_path') ?></th>
                                    <th scope="col" class="text-center"><?= __('Actions') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($employees as $employee): ?>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>

                                        <td><?= h($employee->username) ?></td>
                                        <td><?= h($employee->first_name) ?></td>
                                        <td><?= h($employee->last_name) ?></td>
                                        <td><?= h($employee->email) ?></td>
                                        <td><?= h($employee->phone) ?></td>
                                        <td><?= h($employee->resource_path) ?></td>
                                        <td class="text-center">
                                            <?= $this->Html->link('<i class="fas fa-arrow-from-bottom"></i> Promote', ['action' => 'promote', $employee->id], ['escape' => false, 'class' => 'btn btn-link']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5 text-sm-center">
                                <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">
                                    <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7 text-sm-center">
                                <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                                    <ul class="pagination">
                                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                        <?= $this->Paginator->numbers() ?>
                                        <?= $this->Paginator->next(__('next') . ' >') ?>
                                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!--
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <div><?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button']) ?></div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('growth_profile_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plant_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('harvest_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('watched') ?></th>
                <th scope="col"><?= $this->Paginator->sort('testing_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resource_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= $user->has('user') ? $this->Html->link($user->user->id, ['controller' => 'Users', 'action' => 'view', $user->user->id]) : '' ?></td>
                <td><?= $user->has('growth_profile') ? $this->Html->link($user->growth_profile->name, ['controller' => 'GrowthProfiles', 'action' => 'view', $user->growth_profile->id]) : '' ?></td>
                <td><?= $user->has('plant') ? $this->Html->link($user->plant->name, ['controller' => 'Plants', 'action' => 'view', $user->plant->id]) : '' ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->description) ?></td>
                <td><?= $this->Number->format($user->quantity) ?></td>
                <td><?= h($user->plant_date) ?></td>
                <td><?= h($user->harvest_date) ?></td>
                <td><?= h($user->watched) ?></td>
                <td><?= ''//$testingStatuses[$user->testing_status] ?></td>
                <td><?= h($user->resource_path) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
-->
<!--
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <div><?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button']) ?></div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('business_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resource_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('confirmed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locked') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= $user->has('business') ? $this->Html->link($user->business->name, ['controller' => 'Businesses', 'action' => 'view', $user->business->id]) : '' ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= $this->Number->format($user->role) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->phone) ?></td>
                <td><?= h($user->resource_path) ?></td>
                <td><?= ($user->confirmed) ? '<i class="fas fa-check"></i>' : '<i class="fas fa-ban"></i>' ?></td>
                <td><?= ($user->locked) ? '<i class="fas fa-check"></i>' : '<i class="fas fa-ban"></i>' ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
-->
