<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reading $reading
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Readings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Batches'), ['controller' => 'Batches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Batch'), ['controller' => 'Batches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="readings form large-9 medium-8 columns content">
    <?= $this->Form->create($reading) ?>
    <fieldset>
        <legend><?= __('Add Reading') ?></legend>
        <?php
            echo $this->Form->control('step_id', ['options' => $steps]);
            echo $this->Form->control('batch_id', ['options' => $batches]);
            echo $this->Form->control('name');
            echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
