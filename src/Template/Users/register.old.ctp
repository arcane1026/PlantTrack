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
                    <h2>Registration</h2>
                    <p>In order to create a new Plant Track account, you must be the owner or authorized representative of a business or organization.</p>
                    <p>If you are an employee of a business already using Plant Track, please contact your employer for your account information.</p>
                </li>
                <li class="row">
                    <?= $this->Flash->render() // Render flash message if one is set.?>
                </li>
                <li class="row">
                    <?= $this->Form->button('Continue to Registration <i class="fas fa-arrow-right hvr-icon"></i>', ['class' => 'hvr-icon-pulse', 'escape' => false, 'value' => 'step1']) ?>
                </li>
                <li class="row">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-arrow-left hvr-icon"></i> Sign In Instead'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'button hvr-icon-pulse', 'escape' => false]) ?>
                </li>
            </ul>
        <?= $this->Form->end() ?>
    </div>
</div>
