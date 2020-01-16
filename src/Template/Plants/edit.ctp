<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
?>

<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div>
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="far fa-ellipsis-v visible-on-sidebar-regular"></i>
                    <i class="far fa-bars visible-on-sidebar-mini"></i>
                </button>
            </div>
            <a class="navbar-brand"><?= __('Edit Plant') ?></a>
        </div>
    </div>
</nav>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <?= $this->Form->create($plant, ['class' => 'form-horizontal']) ?>
                    <div class="card-header card-header-text" data-background-color="rose">
                        <h4 class="card-title"><i class="fas fa-leaf"></i> Plant Details</h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Name</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <?= $this->Form->control('name', ['label' => false,'class' => 'form-control']); ?>
                                    <span class="help-block">A block of help text that breaks onto a new line.</span>
                                    <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Description</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <?= $this->Form->control('description', ['label' => false,'class' => 'form-control']); ?>
                                    <span class="help-block">A block of help text that breaks onto a new line.</span>
                                    <span class="material-input"></span></div>
                            </div>
                        </div>
                        <!--
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Image Path</label>

                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <?= $this->Form->control('resource_path', ['label' => false,'class' => 'form-control']); ?>
                                    <span class="help-block">A block of help text that breaks onto a new line.</span>
                                    <span class="material-input"></span></div>
                            </div>
                        </div>
                        -->
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Image</label>

                            <div class="col-sm-10">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="../../assets/img/image_placeholder.jpg" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
									<span class="btn btn-rose btn-round btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="...">
									</span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-button">
                                    <?= $this->Html->link(__('Save Plant'), ['controller' => 'Plants', 'action' => 'index'], ['class' => 'btn btn-fill btn-rose']) ?>
                                    <?= $this->Form->button(__('Save Plant'), ['class' => 'btn btn-fill btn-rose btn-right']) ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!--
<div class="plants form large-9 medium-8 columns content">
    <?= $this->Form->create($plant) ?>
    <fieldset>
        <legend><?= __('Edit Plant') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('resource_path');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
