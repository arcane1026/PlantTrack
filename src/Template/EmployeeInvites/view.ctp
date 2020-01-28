<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeInvite $employeeInvite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee Invite'), ['action' => 'edit', $employeeInvite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee Invite'), ['action' => 'delete', $employeeInvite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeInvite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employee Invites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Invite'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeeInvites view large-9 medium-8 columns content">
    <h3><?= h($employeeInvite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($employeeInvite->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($employeeInvite->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($employeeInvite->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($employeeInvite->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeeInvite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($employeeInvite->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($employeeInvite->modified) ?></td>
        </tr>
    </table>
</div>
