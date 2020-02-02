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
            <a class="navbar-brand" href="#pablo"><?= __('New Growth Profile') ?></a>
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
                    <!--<?= $this->Html->link(__('<i class="fas fa-plus"></i> New Growth Profile'), ['action' => 'add'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>-->
                    <div class="btn btn-primary btn-right"><i class="fas fa-plus"></i> Add Stage</div>
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
                        <?= $this->Form->create(false, ['class' => 'form-horizontal']) ?>
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
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <h4 class="card-title"><?= __('Stages & Steps') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 text-sm-center stage">
                                <div class="card">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <h4 class="card-title"><?= __('Stage 1') ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row stage-toolbar">
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label">Name</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label">Description</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 step">
                                                <div class="card">
                                                    <div class="card-header card-header-rose card-header-icon">
                                                        <h4 class="card-title"><?= __('Step 1') ?></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row step-toolbar">
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Name</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Description</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Duration</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.duration', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 step">
                                                <div class="card">
                                                    <div class="card-header card-header-rose card-header-icon">
                                                        <h4 class="card-title"><?= __('Step 2') ?></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row step-toolbar">
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Name</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Description</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Duration</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.duration', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12">
                                            <div class="btn btn-primary btn-round"><i class="fas fa-plus"></i> Add Step</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 text-sm-center stage">
                                <div class="card">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <h4 class="card-title"><?= __('Stage 2') ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row stage-toolbar">
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label">Name</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label">Description</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 step">
                                                <div class="card">
                                                    <div class="card-header card-header-rose card-header-icon">
                                                        <h4 class="card-title"><?= __('Step 1') ?></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row step-toolbar">
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Name</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Description</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Duration</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.duration', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12">
                                            <div class="btn btn-primary btn-round"><i class="fas fa-plus"></i> Add Step</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 text-sm-center stage">
                                <div class="card">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <h4 class="card-title"><?= __('Stage 3') ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row stage-toolbar">
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label">Name</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label">Description</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 step">
                                                <div class="card">
                                                    <div class="card-header card-header-rose card-header-icon">
                                                        <h4 class="card-title"><?= __('Step 1') ?></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row step-toolbar">
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Name</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Description</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Duration</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.duration', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12">
                                            <div class="btn btn-primary btn-round"><i class="fas fa-plus"></i> Add Step</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 text-sm-center stage">
                                <div class="card">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <h4 class="card-title"><?= __('Stage 4') ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row stage-toolbar">
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label">Name</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label">Description</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 step">
                                                <div class="card">
                                                    <div class="card-header card-header-rose card-header-icon">
                                                        <h4 class="card-title"><?= __('Step 1') ?></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row step-toolbar">
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Name</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Description</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Duration</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.duration', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 step">
                                                <div class="card">
                                                    <div class="card-header card-header-rose card-header-icon">
                                                        <h4 class="card-title"><?= __('Step 2') ?></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row step-toolbar">
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-left"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-trash"></i></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="#" class=""><i class="fas fa-chevron-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Name</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.name', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Description</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.description', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Duration</label>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <?= $this->Form->control('stages.0.duration', ['label' => false, 'class' => 'form-control']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12">
                                            <div class="btn btn-primary btn-round"><i class="fas fa-plus"></i> Add Step</div>
                                        </div>
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
                                    <?= $this->Form->button(__('<i class="fas fa-plus"></i> Create New Growth Profile'), ['class' => 'btn btn-fill btn-rose']) ?>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->end(); ?>
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
-->
