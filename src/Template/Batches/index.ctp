<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch[]|\Cake\Collection\CollectionInterface $batches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Batch'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Growth Profiles'), ['controller' => 'GrowthProfiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Growth Profile'), ['controller' => 'GrowthProfiles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notes'), ['controller' => 'Notes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Note'), ['controller' => 'Notes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Readings'), ['controller' => 'Readings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reading'), ['controller' => 'Readings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="batches index large-9 medium-8 columns content">
    <h3><?= __('Batches') ?></h3>
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
                <td><?= $this->Number->format($batch->testing_status) ?></td>
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
