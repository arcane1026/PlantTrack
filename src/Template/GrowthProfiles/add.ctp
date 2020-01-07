<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrowthProfile $growthProfile
 */
?>
<div class="growthProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($growthProfile) ?>
    <fieldset>
        <legend><?= __('Add Growth Profile') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('plant_id', ['options' => $plants, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
