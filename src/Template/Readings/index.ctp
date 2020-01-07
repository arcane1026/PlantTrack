<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reading[]|\Cake\Collection\CollectionInterface $readings
 */
?>
<div class="readings index large-9 medium-8 columns content">
    <h3><?= __('Readings') ?></h3>
    <div><?= $this->Html->link(__('New Reading'), ['action' => 'add'], ['class' => 'button']) ?></div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('step_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($readings as $reading): ?>
            <tr>
                <td><?= $this->Number->format($reading->id) ?></td>
                <td><?= $reading->has('step') ? $this->Html->link($reading->step->name, ['controller' => 'Steps', 'action' => 'view', $reading->step->id]) : '' ?></td>
                <td><?= $reading->has('batch') ? $this->Html->link($reading->batch->name, ['controller' => 'Batches', 'action' => 'view', $reading->batch->id]) : '' ?></td>
                <td><?= h($reading->name) ?></td>
                <td><?= h($reading->value) ?></td>
                <td><?= h($reading->created) ?></td>
                <td><?= h($reading->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reading->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reading->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reading->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reading->id)]) ?>
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
