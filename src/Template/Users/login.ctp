<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div id="root" class="full-screen-background login-panel img-background">
    <div class="panel">
        <?= $this->Form->create() ?>
            <ul>
                <li>
                    <h1>PlantTrack</h1>
                </li>
                <li class="row">
                    <span><i class="fas fa-fw fa-user"></i></span>
                    <?= $this->Form->control('username', ['placeholder' => 'Username', 'label' => false]) // Username input element ?>
                </li>
                <li class="row">
                    <span><i class="fas fa-fw fa-key"></i></span>
                    <?= $this->Form->control('password', ['placeholder' => 'Password', 'label' => false]) ?>
                </li>
                <li class="row">
                    <?= $this->Flash->render() // Render flash message if one is set.?>
                </li>
                <li class="row">
                    <?= $this->Form->button('<i class="fas fa-sign-in hvr-icon"></i> Sign In', ['class' => 'hvr-icon-pulse', 'escape' => false]) ?>
                </li>
                <li class="row">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-user-headset hvr-icon"></i> Help'), '#', ['class' => 'button hvr-icon-pulse', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-user-plus hvr-icon"></i> Register'), ['controller' => 'Users', 'action' => 'register'], ['class' => 'button hvr-icon-pulse', 'escape' => false]) ?>
                </li>
            </ul>
        <?= $this->Form->end() ?>
    </div>
</div>
