<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch $batch
 */
?>
<div class="batches view large-9 medium-8 columns content">
    <h3><?= h($batch->name) ?></h3>
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
            <th scope="row"><?= __('Plant') ?></th>
            <td><?= $batch->has('plant') ? $this->Html->link($batch->plant->name, ['controller' => 'Plants', 'action' => 'view', $batch->plant->id]) : '' ?></td>
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
            <th scope="row"><?= __('Plant Date') ?></th>
            <td><?= h($batch->plant_date) ?></td>
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
