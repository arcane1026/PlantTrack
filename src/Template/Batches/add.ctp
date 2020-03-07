<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch $batch
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
            <a class="navbar-brand" href="#pablo">New Batch</a>
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
                            <i class="fas fa-box-full"></i>
                        </div>
                        <h4 class="card-title">Batch Details</h4>
                    </div>
                    <div class="card-body ">
                        <?= $this->Form->create($batch, ['class' => 'form-horizontal']) ?>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Plant Type</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <?= $this->Form->control('plant_id', ['options' => $plants, 'label' => false, 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Growth Profile</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <?= $this->Form->control('growth_profile_id', ['options' => $growthProfiles, 'label' => false, 'class' => 'form-control']); ?>
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
                            <div class="row">
                                <label class="col-md-3 col-form-label">Plant Quantity</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <?= $this->Form->control('quantity', ['label' => false, 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Favorite</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <?= $this->Form->control('watched', ['label' => false, 'class' => 'form-check-input', 'type' => 'checkbox']); ?> &nbsp;
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
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
                                        <?= $this->Form->button(__('<i class="fas fa-plus"></i> Create New Batch'), ['class' => 'btn btn-fill btn-rose']) ?>
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

