<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrowthProfile[]|\Cake\Collection\CollectionInterface $growthProfiles
 */
?>
<div class="growthProfiles index large-9 medium-8 columns content">
    <h3><?= __('Growth Profiles') ?></h3>
    <div><?= $this->Html->link(__('New Growth Profile'), ['action' => 'add'], ['class' => 'button']) ?></div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($growthProfiles as $growthProfile): ?>
            <tr>
                <td><?= $this->Number->format($growthProfile->id) ?></td>
                <td><?= $growthProfile->has('user') ? $this->Html->link($growthProfile->user->id, ['controller' => 'Users', 'action' => 'view', $growthProfile->user->id]) : '' ?></td>
                <td><?= $growthProfile->has('plant') ? $this->Html->link($growthProfile->plant->name, ['controller' => 'Plants', 'action' => 'view', $growthProfile->plant->id]) : '' ?></td>
                <td><?= h($growthProfile->name) ?></td>
                <td><?= h($growthProfile->description) ?></td>
                <td><?= h($growthProfile->created) ?></td>
                <td><?= h($growthProfile->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $growthProfile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $growthProfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $growthProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthProfile->id)]) ?>
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
