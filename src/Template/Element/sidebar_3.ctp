<?php
?>
<ul class="nav">
    <li class="nav-item<?= ($activePrimaryNav === 'Dashboard') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-tachometer-alt"></i> <p> Dashboard </p>'), ['controller' => 'Dashboard', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item<?= ($activePrimaryNav === 'Accounts') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-users"></i> <p> Accounts </p>'), ['controller' => 'Accounts', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item pt-separator<?= ($activePrimaryNav === 'AccessLog') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-history"></i> <p> Access Log </p>'), ['controller' => 'AccessLog', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
</ul>
