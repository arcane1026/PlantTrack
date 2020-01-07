<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reading $reading
 */
?>
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
