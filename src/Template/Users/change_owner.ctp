<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Change Owner') ?></legend>
        <p>This will let you change the owner associated with your Plant Track account. Please be certain this is what you mean to do. Once completed, you will lose access to owner functions and will not be able to regain them unless the new owner promotes you back to owner. </p>
        <p><b>If you are certain you wish to give up ownership of your Plant Track account, proceed below.</b></p>
        <p>You must first provide your password, and then select the user you want to make the new owner. You will be signed out after changing ownership.</p>
        <?php
            echo $this->Form->hidden('username', ['hidden' => true, 'value' => $activeUser['username']]);
            echo $this->Form->control('password');
            echo $this->Form->control('new-owner', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Change Account Ownership')) ?>
    <?= $this->Form->end() ?>
</div>
