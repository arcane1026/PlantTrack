<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch $batch
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
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
            <a class="navbar-brand" href="#pablo">Generate QR Code</a>
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
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <h4 class="card-title">QR Display Settings</h4>
                    </div>
                    <div class="card-body ">
                        <?= $this->Form->create(false, ['target' => '_blank']) ?>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="name" name="name" checked class="form-check-input" /> &nbsp;
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
                        <div class="row">
                            <label class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="description" name="description" checked class="form-check-input" /> &nbsp;
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
                        <div class="row">
                            <label class="col-md-3 col-form-label">Growth Profile</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="growthProfile" name="growthProfile" checked class="form-check-input" /> &nbsp;
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
                        <div class="row">
                            <label class="col-md-3 col-form-label">Plant Type</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="plant" name="plant" checked class="form-check-input" /> &nbsp;
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
                        <div class="row">
                            <label class="col-md-3 col-form-label">Quantity</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="quantity" name="quantity" checked class="form-check-input" /> &nbsp;
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
                                    <?= $this->Form->button(__('<i class="fas fa-qrcode"></i> Generate QR Code'), ['escape' => false, 'class' => 'btn btn-rose']) ?>
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
<div class="batches form large-9 medium-8 columns content">
    <?= $this->Form->create(false, ['target' => '_blank']) ?>
    <fieldset>
        <legend><?= __('Generate QR Code') ?></legend>
        <h3>Select Fields for QR Code sheet.</h3>
        <div class="input">
            <input type="checkbox" id="name" name="name" checked />
            <label for="name">Name</label>
        </div>
        <div class="input">
            <input type="checkbox" id="description" name="description" checked />
            <label for="description">Description</label>
        </div>
        <div class="input">
            <input type="checkbox" id="growthProfile" name="growthProfile" checked />
            <label for="growthProfile">Growth Profile</label>
        </div>
        <div class="input">
            <input type="checkbox" id="plant" name="plant" checked />
            <label for="plant">Plant Type</label>
        </div>
        <div class="input">
            <input type="checkbox" id="quantity" name="quantity" checked />
            <label for="quantity">Plant Quantity</label>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Generate Code')) ?>
    <?= $this->Form->end() ?>
</div>
-->
