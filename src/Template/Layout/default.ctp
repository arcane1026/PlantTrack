<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('all.min.css') // Font Awesome ?>
    <?= $this->Html->css('base.css') // CakePHP Built-in CSS Frameworks TODO: EVENTUALLY REMOVE ONCE OUR UI IS COMPLETE ?>
    <?= $this->Html->css('style.css') // CakePHP Default CSS styling TODO: EVENTUALLY REMOVE ONCE OUR UI IS COMPLETE ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a><i class="fas fa-user-circle"></i> <?= $username ?? 'NOT SIGNED IN' ?></a></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-sign-out"></i> Log Out'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
            </ul>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <ul class="side-nav">
                <li class="heading"><?= __('Controllers') ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-building"></i> Businesses'), ['controller' => 'Businesses', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-user"></i> Users'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-seedling"></i> Plants'), ['controller' => 'Plants', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-list-ul"></i> Growth Profiles'), ['controller' => 'GrowthProfiles', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('Stages'), ['controller' => 'Stages', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('Steps'), ['controller' => 'Steps', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-box-full"></i> Batches'), ['controller' => 'Batches', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-thermometer-quarter"></i> Readings'), ['controller' => 'Readings', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-sticky-note"></i> Notes'), ['controller' => 'Notes', 'action' => 'index'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link(__('<i class="fas fa-fw fa-clipboard-list-check"></i> Reports'), ['controller' => 'Reports', 'action' => 'index'], ['escape' => false]) ?></li>
        </nav>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
