<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch $batch
 */
?>
<div class="batches form large-9 medium-8 columns content">
    <?= $this->Form->create($batch) ?>
    <fieldset>
        <legend><?= __('Edit Batch') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('growth_profile_id', ['options' => $growthProfiles]);
            echo $this->Form->control('plant_id', ['options' => $plants]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('quantity');
            echo $this->Form->control('plant_date', ['empty' => true]);
            echo $this->Form->control('harvest_date', ['empty' => true]);
            echo $this->Form->control('watched');
            echo $this->Form->control('testing_status');
            echo $this->Form->control('resource_path');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
