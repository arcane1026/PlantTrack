<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
?>
<div class="reports view large-9 medium-8 columns content">
    <h3><?= h($report->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $report->has('user') ? $this->Html->link($report->user->id, ['controller' => 'Users', 'action' => 'view', $report->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch') ?></th>
            <td><?= $report->has('batch') ? $this->Html->link($report->batch->name, ['controller' => 'Batches', 'action' => 'view', $report->batch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($report->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($report->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($report->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($report->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($report->modified) ?></td>
        </tr>
    </table>
</div>
