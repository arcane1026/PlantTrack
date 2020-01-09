<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div id="root" class="full-screen-background single-panel-centered img-background">
    <div class="panel">
        <?= $this->Form->create() ?>
            <ul>
                <li>
                    <h1>PlantTrack</h1>
                </li>
                <li>
                    <span><i class="fas fa-fw fa-user"></i></span>
                    <?= $this->Form->control('username', ['placeholder' => 'Username', 'label' => false]) // Username input element ?>
                </li>
                <li>
                    <span><i class="fas fa-fw fa-key"></i></span>
                    <?= $this->Form->control('password', ['placeholder' => 'Password', 'label' => false]) ?>
                </li>
                <li>
                    <?= $this->Flash->render() // Render flash message if one is set.?>
                </li>
                <li>
                    <?= $this->Form->button('<i class="fas fa-sign-in hvr-icon"></i> Sign In', ['class' => 'hvr-icon-pulse', 'escape' => false]) ?>
                </li>
            </ul>
        <?= $this->Form->end() ?>
    </div>
</div>
