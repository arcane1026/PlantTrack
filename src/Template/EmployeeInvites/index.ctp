<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeInvite[]|\Cake\Collection\CollectionInterface $employeeInvites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee Invite'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employeeInvites index large-9 medium-8 columns content">
    <h3><?= __('Employee Invites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employeeInvites as $employeeInvite): ?>
            <tr>
                <td><?= $this->Number->format($employeeInvite->id) ?></td>
                <td><?= h($employeeInvite->first_name) ?></td>
                <td><?= h($employeeInvite->last_name) ?></td>
                <td><?= h($employeeInvite->email) ?></td>
                <td><?= h($employeeInvite->phone) ?></td>
                <td><?= h($employeeInvite->created) ?></td>
                <td><?= h($employeeInvite->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employeeInvite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employeeInvite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employeeInvite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeInvite->id)]) ?>
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
