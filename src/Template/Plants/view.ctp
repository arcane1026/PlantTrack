<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Plant'), ['action' => 'edit', $plant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Plant'), ['action' => 'delete', $plant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Plants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Batches'), ['controller' => 'Batches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Batch'), ['controller' => 'Batches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Growth Profiles'), ['controller' => 'GrowthProfiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Growth Profile'), ['controller' => 'GrowthProfiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="plants view large-9 medium-8 columns content">
    <h3><?= h($plant->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $plant->has('user') ? $this->Html->link($plant->user->id, ['controller' => 'Users', 'action' => 'view', $plant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($plant->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($plant->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resource Path') ?></th>
            <td><?= h($plant->resource_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($plant->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($plant->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($plant->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Batches') ?></h4>
        <?php if (!empty($plant->batches)): ?>
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
            <?php foreach ($plant->batches as $batches): ?>
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
        <h4><?= __('Related Growth Profiles') ?></h4>
        <?php if (!empty($plant->growth_profiles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Plant Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($plant->growth_profiles as $growthProfiles): ?>
            <tr>
                <td><?= h($growthProfiles->id) ?></td>
                <td><?= h($growthProfiles->user_id) ?></td>
                <td><?= h($growthProfiles->plant_id) ?></td>
                <td><?= h($growthProfiles->name) ?></td>
                <td><?= h($growthProfiles->description) ?></td>
                <td><?= h($growthProfiles->created) ?></td>
                <td><?= h($growthProfiles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GrowthProfiles', 'action' => 'view', $growthProfiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GrowthProfiles', 'action' => 'edit', $growthProfiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GrowthProfiles', 'action' => 'delete', $growthProfiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthProfiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
