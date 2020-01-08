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
                    <!--<input type="text" placeholder="Username" />-->
                    <?= $this->Form->control('username') ?>
                </li>
                <li>
                    <span><i class="fas fa-fw fa-key"></i></span>
                    <!--<input type="password" placeholder="Password" />-->
                    <?= $this->Form->control('password') ?>
                </li>
                <li>
                    <!--<button>
                        <i class="fas fa-sign-in"></i>
                        <span>Sign In</span>
                    </button>-->
                    <?= $this->Form->button('login') ?>
                </li>
            </ul>
        <?= $this->Form->end() ?>
    </div>
</div>