<?php
?>
<ul class="nav">
    <li class="nav-item<?= ($activePrimaryNav === 'Dashboard') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-tachometer-alt"></i> <p> Dashboard </p>'), ['controller' => 'Dashboard', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item<?= ($activePrimaryNav === 'Batches') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-box-full"></i> <p> Batches </p>'), ['controller' => 'Batches', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item<?= ($activePrimaryNav === 'Testing') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-flask"></i> <p> Testing </p>'), ['controller' => 'Testing', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item pt-separator<?= ($activePrimaryNav === 'Reports') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-analytics"></i> <p> Reports </p>'), ['controller' => 'Reports', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item<?= ($activePrimaryNav === 'GrowthProfiles') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-hand-holding-seedling"></i> <p> Growth Profiles </p>'), ['controller' => 'GrowthProfiles', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item<?= ($activePrimaryNav === 'Plants') ? ' active' : ''?>">
        <?= $this->Html->link(__('<i class="fas fa-leaf"></i> <p> Plants </p>'), ['controller' => 'Plants', 'action' => 'index'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
</ul>
