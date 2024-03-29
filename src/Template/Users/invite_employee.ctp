<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeInvite $employeeInvite
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
            <a class="navbar-brand" href="#pablo">Invite Employee</a>
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
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h4 class="card-title">Employee Details</h4>
                    </div>
                    <div class="card-body ">
                        <?= $this->Form->create($invitation, ['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <label class="col-md-3 col-form-label">First Name</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('first_name', ['label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Last Name</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('last_name', ['label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Email Address</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('email', ['label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Phone Number</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('phone', ['label' => false, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <?= $this->Form->button(__('<i class="fas fa-envelope"></i> Send Invitation'), ['class' => 'btn btn-fill btn-rose']) ?>
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
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= ''// __('Actions') ?></li>
        <li><?= ''// $this->Html->link(__('List Employee Invites'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employeeInvites form large-9 medium-8 columns content">
    <?= ''// $this->Form->create() ?>
    <fieldset>
        <legend><?= ''// __('Add Employee Invite') ?></legend>
        <?php
        //echo $this->Form->control('first_name');
        //echo $this->Form->control('last_name');
        //echo $this->Form->control('email');
        //echo $this->Form->control('phone');
        ?>
    </fieldset>
    <?= ''// $this->Form->button(__('Submit')) ?>
    <?= ''// $this->Form->end() ?>
</div> -->
