<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */

$this->Form->templates([
    'inputContainer' => '{{content}}'
]);

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
            <a class="navbar-brand"><?= __('Add Plant') ?></a>
        </div>
    </div>
</nav>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!--<div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">mail_outline</i>
                    </div>

                    <div class="card-content">
                        <h4 class="card-title">Stacked Form</h4>
                        <form method="#" action="#">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Email address</label>
                                <input type="email" class="form-control">
                                <span class="material-input"></span></div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control">
                                <span class="material-input"></span></div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="terms"><span class="checkbox-material"><span class="check"></span></span>
                                    Subscribe to newsletter
                                </label>
                            </div>
                            <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">contacts</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Horizontal Form</h4>
                        <form class="form-horizontal">
                            <div class="row">
                                <label class="col-md-3 label-on-left">Email</label>

                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="email" class="form-control">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 label-on-left">Password</label>

                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="password" class="form-control">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3"></label>

                                <div class="col-md-9">
                                    <div class="checkbox form-horizontal-checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3"></label>

                                <div class="col-md-9">
                                    <div class="form-group form-button">
                                        <button type="submit" class="btn btn-fill btn-rose">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->

            <div class="col-md-12">
                <div class="card">

                    <?= $this->Form->create($plant, ['class' => 'form-horizontal']) ?>
                    <!--<form method="get" action="/" class="form-horizontal">-->
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title"><i class="fas fa-leaf"></i> <?= __('Plant Details') ?></h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Name</label>

                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <!--<input type="text" class="form-control" value="">-->
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
                                        <!--<input type="text" class="form-control" value="">-->
                                        <?= $this->Form->control('description', ['label' => false,'class' => 'form-control']); ?>
                                        <span class="help-block">A block of help text that breaks onto a new line.</span>
                                        <span class="material-input"></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Image Path</label>

                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <!--<input type="text" class="form-control" value="">-->
                                        <?= $this->Form->control('resource_path', ['label' => false,'class' => 'form-control']); ?>
                                        <span class="help-block">A block of help text that breaks onto a new line.</span>
                                        <span class="material-input"></span></div>
                                </div>
                            </div>




                          <!--
                          <div class="row">
                                <label class="col-sm-2 label-on-left">With help</label>

                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" value="">
                                        <span class="help-block">A block of help text that breaks onto a new line.</span>
                                        <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Password</label>

                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="password" class="form-control" value="">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Placeholder</label>

                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" placeholder="placeholder">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Disabled</label>

                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" placeholder="Disabled input here..." disabled="" class="form-control">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Static control</label>

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <p class="form-control-static">hello@creative-tim.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Checkboxes and radios</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                                            First Checkbox
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                                            Second Checkbox
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" checked="true"><span class="circle"></span><span class="check"></span>
                                            First Radio
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios"><span class="circle"></span><span class="check"></span>
                                            Second Radio
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Inline checkboxes</label>
                                <div class="col-sm-10">
                                    <div class="checkbox checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>a
                                        </label>
                                    </div>

                                    <div class="checkbox checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>b
                                        </label>
                                    </div>

                                    <div class="checkbox checkbox-inline">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>c
                                        </label>
                                    </div>
                                </div>
                            </div>-->

                            <div class="row">
                                <!--<label class="col-sm-2 label-on-left"></label>-->

                                <div class="col-md-12">
                                    <div class="form-group form-button">
                                        <!--<button type="submit" class="btn btn-fill btn-rose">Sign in</button>
                                        <button type="submit" class="btn btn-fill btn-rose" style="margin-left: auto;">Sign in</button>-->
                                        <?= $this->Html->link(__('Cancel'), ['controller' => 'Plants', 'action' => 'index'], ['class' => 'btn btn-fill btn-rose']) ?>
                                        <?= $this->Form->button(__('Add Plant'), ['class' => 'btn btn-fill btn-rose btn-right']) ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?= $this->Form->end() ?>
                    <!--</form>-->
                </div>
            </div>
<!--
            <div class="col-md-12">
                <div class="card">
                    <form method="get" action="/" class="form-horizontal">
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Input Variants</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Custom Checkboxes &amp; radios</label>
                                <div class="col-sm-4 col-sm-offset-1 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                                            Unchecked
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                            Checked
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" disabled=""><span class="checkbox-material"><span class="check"></span></span>
                                            Disabled Unchecked
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" checked="" disabled=""><span class="checkbox-material"><span class="check"></span></span>
                                            Disabled Checked
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-5 checkbox-radios">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios"><span class="circle"></span><span class="check"></span>
                                            Radio is off
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" checked="true"><span class="circle"></span><span class="check"></span>
                                            Radio is on
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadiosDisabled" disabled=""><span class="circle"></span><span class="check"></span>
                                            Disabled Radio is off
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadiosDisabled" checked="true" disabled=""><span class="circle"></span><span class="check"></span>
                                            Disabled Radio is on
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Input with success</label>

                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty has-success">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" value="Success">
                                        <span class="material-icons form-control-feedback">done</span>
                                        <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Input with error</label>

                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty has-error">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" value="Error Input">
                                        <span class="material-icons form-control-feedback">clear</span>
                                        <span class="material-input"></span></div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Column sizing</label>

                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" placeholder=".col-md-3">
                                                <span class="material-input"></span></div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" placeholder=".col-md-4">
                                                <span class="material-input"></span></div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" placeholder=".col-md-5">
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>-->
        </div>

    </div>
</div>
<!--
<div class="plants form large-9 medium-8 columns content">
    <?= $this->Form->create($plant) ?>
    <fieldset>
        <legend><?= __('Add Plant') ?></legend>
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
