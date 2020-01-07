<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrowthProfile $growthProfile
 */
?>
<div class="growthProfiles view large-9 medium-8 columns content">
    <h3><?= h($growthProfile->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $growthProfile->has('user') ? $this->Html->link($growthProfile->user->id, ['controller' => 'Users', 'action' => 'view', $growthProfile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plant') ?></th>
            <td><?= $growthProfile->has('plant') ? $this->Html->link($growthProfile->plant->name, ['controller' => 'Plants', 'action' => 'view', $growthProfile->plant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($growthProfile->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($growthProfile->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($growthProfile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($growthProfile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($growthProfile->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Batches') ?></h4>
        <?php if (!empty($growthProfile->batches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Growth Profile Id') ?></th>
                <th scope="col"><?= __('Plant Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Plant Date') ?></th>
                <th scope="col"><?= __('Harvest Date') ?></th>
                <th scope="col"><?= __('Watched') ?></th>
                <th scope="col"><?= __('Testing Status') ?></th>
                <th scope="col"><?= __('Resource Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($growthProfile->batches as $batches): ?>
            <tr>
                <td><?= h($batches->id) ?></td>
                <td><?= h($batches->user_id) ?></td>
                <td><?= h($batches->growth_profile_id) ?></td>
                <td><?= h($batches->plant_id) ?></td>
                <td><?= h($batches->name) ?></td>
                <td><?= h($batches->description) ?></td>
                <td><?= h($batches->quantity) ?></td>
                <td><?= h($batches->plant_date) ?></td>
                <td><?= h($batches->harvest_date) ?></td>
                <td><?= h($batches->watched) ?></td>
                <td><?= h($batches->testing_status) ?></td>
                <td><?= h($batches->resource_path) ?></td>
                <td><?= h($batches->created) ?></td>
                <td><?= h($batches->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Batches', 'action' => 'view', $batches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Batches', 'action' => 'edit', $batches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Batches', 'action' => 'delete', $batches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stages') ?></h4>
        <?php if (!empty($growthProfile->stages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Growth Profile Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($growthProfile->stages as $stages): ?>
            <tr>
                <td><?= h($stages->id) ?></td>
                <td><?= h($stages->growth_profile_id) ?></td>
                <td><?= h($stages->name) ?></td>
                <td><?= h($stages->description) ?></td>
                <td><?= h($stages->created) ?></td>
                <td><?= h($stages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stages', 'action' => 'view', $stages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stages', 'action' => 'edit', $stages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stages', 'action' => 'delete', $stages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
