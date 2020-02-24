<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrowthProfile $growthProfile
 */
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo"><?= __('Edit Growth Profile') ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="form-inline">
                    <!--<?= $this->Html->link(__('<i class="fas fa-plus"></i> Edit Growth Profile'), ['action' => 'add'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>-->
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<div class="content growth-profile-add">
    <div class="container-fluid">
        <?= $this->Flash->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-hand-holding-seedling"></i>
                        </div>
                        <h4 class="card-title"><?= __('Growth Profile Details') ?></h4>
                    </div>
                    <div class="card-body">
                        <?= $this->Form->create($growthProfile, ['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <?= $this->Form->control('name', ['label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <?= $this->Form->control('description', ['label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label">Plant</label>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <?= $this->Form->control('plant_id', ['options' => $plants, 'empty' => true, 'label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <?= $this->Form->button(__('<i class="fas fa-save"></i> Save Growth Profile'), ['class' => 'btn btn-fill btn-rose']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="growthProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($growthProfile) ?>
    <fieldset>
        <legend><?= __('Add Growth Profile') ?></legend>
        <?php
echo $this->Form->control('user_id', ['options' => $users]);
echo $this->Form->control('plant_id', ['options' => $plants, 'empty' => true]);
echo $this->Form->control('name');
echo $this->Form->control('description');
?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="growthProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($growthProfile) ?>
    <fieldset>
        <legend><?= __('Edit Growth Profile') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('plant_id', ['options' => $plants, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

-->
