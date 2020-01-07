<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Step $step
 */
?>
<div class="steps view large-9 medium-8 columns content">
    <h3><?= h($step->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stage') ?></th>
            <td><?= $step->has('stage') ? $this->Html->link($step->stage->name, ['controller' => 'Stages', 'action' => 'view', $step->stage->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($step->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($step->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($step->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($step->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($step->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($step->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Notes') ?></h4>
        <?php if (!empty($step->notes)): ?>
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
            <?php foreach ($step->notes as $notes): ?>
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
        <?php if (!empty($step->readings)): ?>
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
            <?php foreach ($step->readings as $readings): ?>
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
</div>
