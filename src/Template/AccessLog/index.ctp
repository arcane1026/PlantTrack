<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessLog[]|\Cake\Collection\CollectionInterface $accessLog
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
            <a class="navbar-brand" href="#pablo"><?= __('Access Log') ?></a>
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
                            <i class="fas fa-history"></i>
                        </div>
                        <h4 class="card-title"><?= __('Access Log') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                                    <th scope="col" class="fill-remaining"><?= $this->Paginator->sort('password') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('ip_address') ?></th>
                                    <th scope="col" class="text-center"><?= $this->Paginator->sort('result') ?></th>
                                    <th scope="col" class="text-right"><?= $this->Paginator->sort('created', ['label' => 'Timestamp']) ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($accessLog as $accessLogItem): ?>
                                    <tr class="table-<?= ($accessLogItem->result === true) ? 'success' : 'danger' ?>">
                                        <td><?= h($accessLogItem->username) ?></td>
                                        <td><?= h($accessLogItem->password) ?></td>
                                        <td><?= h($accessLogItem->ip_address) ?></td>
                                        <td class="text-center"><?= ($accessLogItem->result === true) ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' ?></td>
                                        <td class="text-right"><?= h($accessLogItem->created) ?></td>
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
<div class="accessLog index large-9 medium-8 columns content">
    <h3><?= __('Access Log') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('result') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accessLog as $accessLog): ?>
            <tr>
                <td><?= h($accessLog->username) ?></td>
                <td><?= h($accessLog->password) ?></td>
                <td><?= h($accessLog->ip_address) ?></td>
                <td><?= ($accessLog->result === true) ? '<i class="fas fa-check"></i>' : '<i class="fas fa-ban"></i>' ?></td>
                <td><?= h($accessLog->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accessLog->id]) ?>
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
