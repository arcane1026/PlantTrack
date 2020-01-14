<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessLog[]|\Cake\Collection\CollectionInterface $accessLog
 */
?>
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
