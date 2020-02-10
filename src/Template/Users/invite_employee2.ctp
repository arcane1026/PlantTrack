<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Enter New Employee Information to Complete Registration!') ?></legend>
        <?php
        // all lines that are comment out need to be saved outside of form
     //   echo $this->Form->control('business_id', ['options' => $businesses]);
        echo $this->Form->control('username');
        echo $this->Form->control('password');
        //echo $this->Form->control('role');
        echo $this->Form->control('first_name');
        echo $this->Form->control('last_name');
        echo $this->Form->control('email');
        echo $this->Form->control('phone');
        //echo $this->Form->control('resource_path');
        //echo $this->Form->control('confirmed');
       // echo $this->Form->control('locked');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
