<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
            <a class="navbar-brand" href="#pablo">Change Owner</a>
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
                            <i class="fas fa-user-crown"></i>
                        </div>
                        <h4 class="card-title">Change Owner</h4>
                    </div>
                    <div class="card-body ">
                        <p>This will let you change the owner associated with your business' Plant Track account. Please be certain this is what you mean to do. Once completed, you will lose access to owner functions and will not be able to regain them unless the new owner promotes you back to owner. </p>
                        <p style="font-size: 1.2rem"><b>If you are certain you wish to give up ownership of your Plant Track account, please proceed below.</b></p>
                        <p>You must first provide your current password, and then select the current manager you want to make the new owner. You will be signed out after changing ownership.</p>
                        <?= $this->Form->create(false, ['class' => 'form-horizontal']) ?>
                        <?= $this->Form->hidden('username', ['hidden' => true, 'value' => $activeUser['username']]); ?>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Current Password</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('password', ['required' => true, 'label' => false, 'class' => 'form-control'] ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">New Owner</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?= $this->Form->control('new-owner', ['label' => false, 'class' => 'form-control', 'options' => $users]); ?>
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
                                    <?= $this->Form->button(__('<i class="fas fa-user-sync"></i> Change Account Ownership'), ['class' => 'btn btn-fill btn-rose']) ?>
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
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Change Owner') ?></legend>
        <p>This will let you change the owner associated with your Plant Track account. Please be certain this is what you mean to do. Once completed, you will lose access to owner functions and will not be able to regain them unless the new owner promotes you back to owner. </p>
        <p><b>If you are certain you wish to give up ownership of your Plant Track account, proceed below.</b></p>
        <p>You must first provide your password, and then select the user you want to make the new owner. You will be signed out after changing ownership.</p>
        <?php
            echo $this->Form->hidden('username', ['hidden' => true, 'value' => $activeUser['username']]);
            echo $this->Form->control('password');
            echo $this->Form->control('new-owner', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Change Account Ownership')) ?>
    <?= $this->Form->end() ?>
</div>
-->
