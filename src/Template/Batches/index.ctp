<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch[]|\Cake\Collection\CollectionInterface $batches
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
            <a class="navbar-brand" href="#pablo">Batches</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <div class="form-inline">
                <?= $this->Html->link(__('<i class="fas fa-plus"></i> New Batch'), ['action' => 'add'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!--<a class="nav-link" href="#pablo">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>-->

                </li>
                <!--<li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Mike John responded to your email</a>
                        <a class="dropdown-item" href="#">You have 5 new tasks</a>
                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                        <a class="dropdown-item" href="#">Another Notification</a>
                        <a class="dropdown-item" href="#">Another One</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>-->
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
                            <i class="fas fa-box-full"></i>
                        </div>
                        <h4 class="card-title">Batches</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                <tr><!--
                                    <th class="text-center">#</th>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Type</th>
                                    <th>Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Amount</th>-->

                                    <th scope="col"></th>
                                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                                    <th scope="col" class="text-center"><?= $this->Paginator->sort('quantity') ?></th>
                                    <th scope="col" class="text-center"><?= $this->Paginator->sort('watched') ?></th>
                                    <th scope="col" class="text-center"><?= $this->Paginator->sort('testing_status') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('plant_date') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('harvest_date') ?></th>
                                    <th scope="col" class="text-right"><?= $this->Paginator->sort('resource_path') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($batches as $batch): ?>
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
                                        <td><?=
                                            $this->Html->link(__($batch->name), ['action' => 'view', $batch->id]) ?></td>
                                        <td class="fill-remaining"><?= h($batch->description) ?></td>
                                        <td class="text-center"><?= $this->Number->format($batch->quantity) ?></td>
                                        <td class="text-center">
                                            <a href="#" type="button" class="btn <?= ($batch->watched === true) ? 'btn-rose' : 'btn-default' ?> btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="<?= ($batch->watched === true) ? 'Favorite' : '' ?>">
                                                <i class="fa<?= ($batch->watched === true) ? 's' : 'l' ?> fa-heart"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-<?= $testingStatuses[$batch->testing_status]['style'] ?> btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="<?= $testingStatuses[$batch->testing_status]['name'] ?>">
                                                <i class="fas fa-<?= $testingStatuses[$batch->testing_status]['icon'] ?>"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                        <td><?= h($batch->plant_date) ?></td>
                                        <td><?= h($batch->harvest_date) ?></td>
                                        <td class="text-right"><?= h($batch->resource_path) ?></td>
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
<div class="batches index large-9 medium-8 columns content">
    <h3><?= __('Batches') ?></h3>
    <div><?= $this->Html->link(__('New Batch'), ['action' => 'add'], ['class' => 'button']) ?></div>
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
            <?php foreach ($batches as $batch): ?>
            <tr>
                <td><?= $this->Number->format($batch->id) ?></td>
                <td><?= $batch->has('user') ? $this->Html->link($batch->user->id, ['controller' => 'Users', 'action' => 'view', $batch->user->id]) : '' ?></td>
                <td><?= $batch->has('growth_profile') ? $this->Html->link($batch->growth_profile->name, ['controller' => 'GrowthProfiles', 'action' => 'view', $batch->growth_profile->id]) : '' ?></td>
                <td><?= $batch->has('plant') ? $this->Html->link($batch->plant->name, ['controller' => 'Plants', 'action' => 'view', $batch->plant->id]) : '' ?></td>
                <td><?= h($batch->name) ?></td>
                <td><?= h($batch->description) ?></td>
                <td><?= $this->Number->format($batch->quantity) ?></td>
                <td><?= h($batch->plant_date) ?></td>
                <td><?= h($batch->harvest_date) ?></td>
                <td><?= h($batch->watched) ?></td>
                <td><?= ''//$testingStatuses[$batch->testing_status] ?></td>
                <td><?= h($batch->resource_path) ?></td>
                <td><?= h($batch->created) ?></td>
                <td><?= h($batch->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $batch->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $batch->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $batch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batch->id)]) ?>
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
