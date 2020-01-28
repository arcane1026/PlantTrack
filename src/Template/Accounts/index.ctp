<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business[]|\Cake\Collection\CollectionInterface $businesses
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch[]|\Cake\Collection\CollectionInterface $plants
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
            <a class="navbar-brand" href="#pablo"><?= __('Accounts') ?></a>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4 class="card-title"><?= __('Accounts') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Business Name']) ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('username', ['label' => 'Business Owner']) ?></th>
                                    <th scope="col" class="text-right"><?= $this->Paginator->sort('created') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($businesses as $business): ?>
                                    <tr>
                                        <td><?= $this->Html->link(h($business->name), ['action' => 'view', $business->id]) ?></td>
                                        <td><?= $this->Html->link(h($business->owner['username'] ?? 'UNKNOWN'), ['controller' => 'Accounts', 'action' => 'view_user', $business->owner['id']]) ?></td>
                                        <td class="text-right"><?= h($business->created) ?></td>
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

<div class="businesses index large-9 medium-8 columns content">
    <h3><?= __('Businesses') ?></h3>
    <div><?= $this->Html->link(__('New Business'), ['action' => 'add'], ['class' => 'button']) ?></div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('street') ?></th>
                <th scope="col"><?= $this->Paginator->sort('street2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businesses as $business): ?>
            <tr>
                <td><?= $this->Number->format($business->id) ?></td>
                <td><?= h($business->name) ?></td>
                <td><?= h($business->street) ?></td>
                <td><?= h($business->street2) ?></td>
                <td><?= h($business->city) ?></td>
                <td><?= h($business->state) ?></td>
                <td><?= h($business->zip) ?></td>
                <td><?= h($business->created) ?></td>
                <td><?= h($business->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $business->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $business->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?>
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
