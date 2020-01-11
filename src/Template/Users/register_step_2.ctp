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
                    <h3>Business Information</h3>
                </li>
                <li>
                    <?= $this->Form->control('name', ['placeholder' => 'Business Name', 'label' => false]); ?>
                    <?php if (!empty($errors['name'])): foreach ($errors['name'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('street', ['placeholder' => 'Street', 'label' => false]) ?>
                    <?php if (!empty($errors['street'])): foreach ($errors['street'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('street2', ['placeholder' => '(optional)', 'label' => false]) ?>
                    <?php if (!empty($errors['street2'])): foreach ($errors['street2'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('city', ['placeholder' => 'City', 'label' => false]) ?>
                    <?php if (!empty($errors['city'])): foreach ($errors['city'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('state', ['placeholder' => 'State', 'label' => false]) ?>
                    <?php if (!empty($errors['state'])): foreach ($errors['state'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('zip', ['placeholder' => 'Zip Code', 'label' => false]) ?>
                    <?php if (!empty($errors['zip'])): foreach ($errors['zip'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Flash->render() // Render flash message if one is set.?>
                </li>
                <li class="row">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-arrow-left hvr-icon"></i> Cancel'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'button hvr-icon-pulse', 'escape' => false]) ?>
                    <?= $this->Form->button('Next <i class="fas fa-arrow-right hvr-icon"></i>', ['class' => 'hvr-icon-pulse', 'escape' => false]) ?>
                </li>
            </ul>
        <?= $this->Form->end() ?>
    </div>
</div>
