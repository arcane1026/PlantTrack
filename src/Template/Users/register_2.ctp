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
                    <h3>User Information</h3>
                </li>
                <li class="row">
                    <?= $this->Form->control('username', ['placeholder' => 'Username', 'label' => false]); ?>
                    <?php if (!empty($errors['username'])): foreach ($errors['username'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('password', ['placeholder' => 'Password', 'label' => false]) ?>
                    <?php if (!empty($errors['password'])): foreach ($errors['password'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('repeat_password', ['placeholder' => 'Repeat Password', 'label' => false]) ?>
                    <?php if (!empty($errors['repeat_password'])): foreach ($errors['repeat_password'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <br />
                <li class="row">
                    <?= $this->Form->control('first_name', ['placeholder' => 'First Name', 'label' => false]) ?>
                    <?php if (!empty($errors['first_name'])): foreach ($errors['first_name'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('last_name', ['placeholder' => 'Last Name', 'label' => false]) ?>
                    <?php if (!empty($errors['last_name'])): foreach ($errors['last_name'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('email', ['placeholder' => 'Email Address', 'label' => false]) ?>
                    <?php if (!empty($errors['email'])): foreach ($errors['email'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Form->control('phone', ['placeholder' => 'Phone Number', 'label' => false]) ?>
                    <?php if (!empty($errors['phone'])): foreach ($errors['phone'] as $error): ?>
                        <div class="error"><?= $error ?></div>
                    <?php endforeach; endif; ?>
                </li>
                <li class="row">
                    <?= $this->Flash->render() // Render flash message if one is set.?>
                </li>
                <li class="row">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-arrow-left hvr-icon"></i> Cancel'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'button hvr-icon-pulse', 'escape' => false]) ?>
                    <?= $this->Form->button('Complete Registration <i class="fas fa-arrow-right hvr-icon"></i>', ['class' => 'hvr-icon-pulse', 'escape' => false]) ?>
                </li>
            </ul>
        <?= $this->Form->end() ?>
    </div>
</div>

<?php
/*
echo $this->Form->control('street');
echo $this->Form->control('street2');
echo $this->Form->control('city');
echo $this->Form->control('state');
echo $this->Form->control('zip');


echo $this->Form->control('business_id', ['options' => $businesses]);
echo $this->Form->control('username');
echo $this->Form->control('password');
echo $this->Form->control('role');
echo $this->Form->control('first_name');
echo $this->Form->control('last_name');
echo $this->Form->control('email');
echo $this->Form->control('phone');
echo $this->Form->control('resource_path');
echo $this->Form->control('confirmed');
echo $this->Form->control('locked');
*/
?>
