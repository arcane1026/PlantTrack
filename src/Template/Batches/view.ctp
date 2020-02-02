<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch $batch
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
            <a class="navbar-brand" href="#pablo"><?= __('View Batch') ?></a>
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
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-arrow-from-left"></i> Next Step'), ['action' => 'next_step', $batch->id], ['escape' => false, 'class' => 'btn btn-rose']) ?>
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-qrcode"></i> QR Code'), ['action' => 'qr_code', $batch->id], ['escape' => false, 'class' => 'btn btn-rose']) ?>
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
                        <div class="card-toolbar">
                            <?= $this->Html->link(__('<i class="fas fa-fw fa-edit"></i>'), ['action' => 'edit', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-rose btn-icon-only']) ?>
                            <?= $this->Form->postLink(__('<i class="fas fa-fw fa-trash"></i>'), ['action' => 'delete', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-danger btn-icon-only', 'confirm' => __('Are you sure you want to delete the batch named: {0}?', $batch->name)]) ?>
                        </div>
                        <div class="card-icon">
                            <i class="fas fa-box-full"></i>
                        </div>
                        <h4 class="card-title"><?= __('Batch Details') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-horizontal table-hover">
                                <tr>
                                    <th><?= __('Name') ?></th>
                                    <td class="text-right"><?= h($batch->name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Description') ?></th>
                                    <td class="text-right"><?= h($batch->description) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Resource Path (Image)') ?></th>
                                    <td class="text-right"><?= h($batch->resource_path) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created By') ?></th>
                                    <td class="text-right"><?= $batch->has('user') ? $this->Html->link($batch->user->first_name . ' ' . $batch->user->last_name, ['controller' => 'Users', 'action' => 'view', $batch->user->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created On') ?></th>
                                    <td class="text-right"><?= h($batch->created) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Last Modified') ?></th>
                                    <td class="text-right"><?= h($batch->modified) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--

<nav id="page-navbar" class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div>
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="far fa-ellipsis-v visible-on-sidebar-regular"></i>
                    <i class="far fa-bars visible-on-sidebar-mini"></i>
                </button>
            </div>
            <a class="navbar-brand"><?= __('View Batch') ?></a>
        </div>
        <div class="form-inline">
            <?= $this->Html->link(__('<i class="fas fa-fw fa-pencil-alt"></i> Edit'), ['action' => 'edit', $batch->id], ['escape' => false, 'class' => 'btn btn-rose']) ?>
            <?= $this->Form->postLink(__('<i class="fas fa-fw fa-trash"></i> Delete'), ['action' => 'delete', $batch->id], ['escape' => false, 'class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete the batch named: {0}?', $batch->name)]) ?>
        </div>
    </div>
</nav>

<div class="content">
    <div class="container-fluid">
        <?= $this->Flash->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-leaf"></i> <?= __('Batch Details') ?>
                    </h4>

                    <div class="card-content">
                        <h4 class="card-title">&nbsp;</h4>
                        <div class="table-responsive">
                            <table class="table vertical-table">
                                <tbody>
                                <tr>
                                    <th><?= __('Name') ?></th>
                                    <td class="text-right"><?= h($batch->name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Description') ?></th>
                                    <td class="text-right"><?= h($batch->description) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Resource Path (Image)') ?></th>
                                    <td class="text-right"><?= h($batch->resource_path) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created By') ?></th>
                                    <td class="text-right"><?= $batch->has('user') ? $this->Html->link($batch->user->first_name . ' ' . $batch->user->last_name, ['controller' => 'Users', 'action' => 'view', $batch->user->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created On') ?></th>
                                    <td class="text-right"><?= h($batch->created) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Last Modified') ?></th>
                                    <td class="text-right"><?= h($batch->modified) ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-box-full"></i> <?= __('Batches Using This Batch') ?>
                    </h4>

                    <div class="card-content">
                        <h4 class="card-title">&nbsp;</h4>
                        <div class="table-responsive">
                            <?php if (!empty($batch->batches)): ?>
                                <table cellpadding="0" cellspacing="0" class="table">
                                    <tr>
                                        <th scope="col"><?= __('Name') ?></th>
                                        <th scope="col"><?= __('Watched') ?></th>
                                        <th scope="col"><?= __('Description') ?></th>
                                        <th class="text-right" scope="col"><?= __('Created') ?></th>
                                    </tr>
                                    <?php foreach ($batch->batches as $batches): ?>
                                        <tr>
                                            <td><?= $this->Html->link(h($batches->name), ['controller' => 'Batches', 'action' => 'view', $batches->id]) ?></td>
                                            <td><?= h($batches->watched) ?></td>
                                            <td><?= h($batches->description) ?></td>
                                            <td class="text-right"><?= h($batches->created) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php else: ?>
                                <div>There are no batches using this batch.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-hand-holding-seedling"></i> <?= __('Growth Profiles Using This Batch') ?>
                    </h4>

                    <div class="card-content">
                        <h4 class="card-title">&nbsp;</h4>
                        <div class="table-responsive">
                            <?php if (!empty($batch->growth_profiles)): ?>
                                <table cellpadding="0" cellspacing="0" class="table">
                                    <tr>
                                        <th scope="col"><?= __('Name') ?></th>
                                        <th scope="col"><?= __('Description') ?></th>
                                        <th class="text-right" scope="col"><?= __('Created') ?></th>
                                    </tr>
                                    <?php foreach ($batch->growth_profiles as $growthProfiles): ?>
                                        <tr>
                                            <td><?= $this->Html->link(h($growthProfiles->name), ['controller' => 'GrowthProfiles', 'action' => 'view', $growthProfiles->id]) ?></td>
                                            <td><?= h($growthProfiles->description) ?></td>
                                            <td class="text-right"><?= h($growthProfiles->created) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php else: ?>
                                <div>There are no growth profiles using this batch.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>







<div class="batches view large-9 medium-8 columns content">
    <h3><?= h($batch->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $batch->has('user') ? $this->Html->link($batch->user->id, ['controller' => 'Users', 'action' => 'view', $batch->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($batch->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($batch->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resource Path') ?></th>
            <td><?= h($batch->resource_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($batch->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($batch->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($batch->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Batches') ?></h4>
        <?php if (!empty($batch->batches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Growth Profile Id') ?></th>
                <th scope="col"><?= __('Batch Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Batch Date') ?></th>
                <th scope="col"><?= __('Harvest Date') ?></th>
                <th scope="col"><?= __('Watched') ?></th>
                <th scope="col"><?= __('Testing Status') ?></th>
                <th scope="col"><?= __('Resource Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($batch->batches as $batches): ?>
            <tr>
                <td><?= h($batches->id) ?></td>
                <td><?= h($batches->user_id) ?></td>
                <td><?= h($batches->growth_profile_id) ?></td>
                <td><?= h($batches->batch_id) ?></td>
                <td><?= h($batches->name) ?></td>
                <td><?= h($batches->description) ?></td>
                <td><?= h($batches->quantity) ?></td>
                <td><?= h($batches->batch_date) ?></td>
                <td><?= h($batches->harvest_date) ?></td>
                <td><?= h($batches->watched) ?></td>
                <td><?= h($batches->testing_status) ?></td>
                <td><?= h($batches->resource_path) ?></td>
                <td><?= h($batches->created) ?></td>
                <td><?= h($batches->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Batches', 'action' => 'view', $batches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Batches', 'action' => 'edit', $batches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Batches', 'action' => 'delete', $batches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Growth Profiles') ?></h4>
        <?php if (!empty($batch->growth_profiles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Batch Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($batch->growth_profiles as $growthProfiles): ?>
            <tr>
                <td><?= h($growthProfiles->id) ?></td>
                <td><?= h($growthProfiles->user_id) ?></td>
                <td><?= h($growthProfiles->batch_id) ?></td>
                <td><?= h($growthProfiles->name) ?></td>
                <td><?= h($growthProfiles->description) ?></td>
                <td><?= h($growthProfiles->created) ?></td>
                <td><?= h($growthProfiles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GrowthProfiles', 'action' => 'view', $growthProfiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GrowthProfiles', 'action' => 'edit', $growthProfiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GrowthProfiles', 'action' => 'delete', $growthProfiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthProfiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div> -->

<!--
<div class="batches view large-9 medium-8 columns content">
    <h3><?= h($batch->name) ?></h3>
    <?= $this->Html->link(__('Generate QR Code'), ['action' => 'qr_code', $batch->growth_profile->id], ['class' => 'button']) ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $batch->has('user') ? $this->Html->link($batch->user->id, ['controller' => 'Users', 'action' => 'view', $batch->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Growth Profile') ?></th>
            <td><?= $batch->has('growth_profile') ? $this->Html->link($batch->growth_profile->name, ['controller' => 'GrowthProfiles', 'action' => 'view', $batch->growth_profile->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch') ?></th>
            <td><?= $batch->has('batch') ? $this->Html->link($batch->batch->name, ['controller' => 'Batches', 'action' => 'view', $batch->batch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($batch->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($batch->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resource Path') ?></th>
            <td><?= h($batch->resource_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($batch->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($batch->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Testing Status') ?></th>
            <td><?= $this->Number->format($batch->testing_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Date') ?></th>
            <td><?= h($batch->batch_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Harvest Date') ?></th>
            <td><?= h($batch->harvest_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($batch->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($batch->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Watched') ?></th>
            <td><?= $batch->watched ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Notes') ?></h4>
        <?php if (!empty($batch->notes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Step Id') ?></th>
                <th scope="col"><?= __('Batch Id') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($batch->notes as $notes): ?>
            <tr>
                <td><?= h($notes->id) ?></td>
                <td><?= h($notes->user_id) ?></td>
                <td><?= h($notes->step_id) ?></td>
                <td><?= h($notes->batch_id) ?></td>
                <td><?= h($notes->body) ?></td>
                <td><?= h($notes->created) ?></td>
                <td><?= h($notes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notes', 'action' => 'view', $notes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notes', 'action' => 'edit', $notes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notes', 'action' => 'delete', $notes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Readings') ?></h4>
        <?php if (!empty($batch->readings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Step Id') ?></th>
                <th scope="col"><?= __('Batch Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($batch->readings as $readings): ?>
            <tr>
                <td><?= h($readings->id) ?></td>
                <td><?= h($readings->step_id) ?></td>
                <td><?= h($readings->batch_id) ?></td>
                <td><?= h($readings->name) ?></td>
                <td><?= h($readings->value) ?></td>
                <td><?= h($readings->created) ?></td>
                <td><?= h($readings->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Readings', 'action' => 'view', $readings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Readings', 'action' => 'edit', $readings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Readings', 'action' => 'delete', $readings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $readings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reports') ?></h4>
        <?php if (!empty($batch->reports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Batch Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($batch->reports as $reports): ?>
            <tr>
                <td><?= h($reports->id) ?></td>
                <td><?= h($reports->user_id) ?></td>
                <td><?= h($reports->batch_id) ?></td>
                <td><?= h($reports->name) ?></td>
                <td><?= h($reports->description) ?></td>
                <td><?= h($reports->created) ?></td>
                <td><?= h($reports->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
-->
