<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Business $business
 */
?>
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
            <a class="navbar-brand" href="#pablo">Edit Business</a>
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
                        <?= $this->Form->create($business, ['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('name', ['required' => true, 'label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Street</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('street', ['required' => true, 'label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Street Line 2</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('street2', ['label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Street</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('city', ['required' => true, 'label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Street</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('state', ['required' => true, 'label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Street</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('zip', ['required' => true, 'label' => false, 'class' => 'form-control']); ?>
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
                                    <?= $this->Form->button(__('<i class="fas fa-save"></i> Save Business'), ['class' => 'btn btn-fill btn-rose']) ?>
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
<!--

<div class="businesses form large-9 medium-8 columns content">
    <?= $this->Form->create($business) ?>
    <fieldset>
        <legend><?= __('Edit Business') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('street');
            echo $this->Form->control('street2');
            echo $this->Form->control('city');
            echo $this->Form->control('state');
            echo $this->Form->control('zip');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
-->
