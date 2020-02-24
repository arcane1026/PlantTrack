<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
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
            <a class="navbar-brand" href="#pablo">Edit Stage</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <?= $this->Flash->render(); ?>
        <div class="row">

            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-hand-holding-seedling"></i>
                        </div>
                        <h4 class="card-title">Stage Details</h4>
                    </div>
                    <div class="card-body ">
                        <?= $this->Form->create($stage, ['class' => 'form-horizontal']) ?>
                        <?= $this->Form->control('stage_id', ['type' => 'hidden']); ?>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Growth Profile</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" value="<?= $stage->growth_profile->name ?>" class="form-control" disabled readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('name', ['label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('description', ['label' => false, 'class' => 'form-control']); ?>
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
                                    <?= $this->Form->button(__('<i class="fas fa-save"></i> Save Stage'), ['class' => 'btn btn-fill btn-rose']) ?>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
