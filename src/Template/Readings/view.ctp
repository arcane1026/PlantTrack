<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reading $reading
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reading'), ['action' => 'edit', $reading->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reading'), ['action' => 'delete', $reading->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reading->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Readings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reading'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Batches'), ['controller' => 'Batches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Batch'), ['controller' => 'Batches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="readings view large-9 medium-8 columns content">
    <h3><?= h($reading->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Step') ?></th>
            <td><?= $reading->has('step') ? $this->Html->link($reading->step->name, ['controller' => 'Steps', 'action' => 'view', $reading->step->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch') ?></th>
            <td><?= $reading->has('batch') ? $this->Html->link($reading->batch->name, ['controller' => 'Batches', 'action' => 'view', $reading->batch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($reading->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($reading->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reading->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reading->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reading->modified) ?></td>
        </tr>
    </table>
</div>
