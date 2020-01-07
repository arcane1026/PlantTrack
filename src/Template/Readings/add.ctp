<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reading $reading
 */
?>
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
