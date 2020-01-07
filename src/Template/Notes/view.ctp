<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note $note
 */
?>
<div class="notes view large-9 medium-8 columns content">
    <h3><?= h($note->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $note->has('user') ? $this->Html->link($note->user->id, ['controller' => 'Users', 'action' => 'view', $note->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Step') ?></th>
            <td><?= $note->has('step') ? $this->Html->link($note->step->name, ['controller' => 'Steps', 'action' => 'view', $note->step->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch') ?></th>
            <td><?= $note->has('batch') ? $this->Html->link($note->batch->name, ['controller' => 'Batches', 'action' => 'view', $note->batch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($note->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($note->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($note->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($note->body)); ?>
    </div>
</div>
