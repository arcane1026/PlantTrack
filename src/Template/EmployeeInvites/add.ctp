<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeInvite $employeeInvite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employee Invites'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employeeInvites form large-9 medium-8 columns content">
    <?= $this->Form->create($employeeInvite) ?>
    <fieldset>
        <legend><?= __('Add Employee Invite') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>