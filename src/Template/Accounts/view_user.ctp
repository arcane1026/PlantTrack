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
            <a class="navbar-brand" href="#pablo"><?= __('User') ?></a>
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
                    <?= ''// $this->Html->link(__('<i class="fas fa-plus"></i> New Plant'), ['action' => 'add'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
                </li>
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
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h4 class="card-title"><?= __('User') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3>User Account Details</h3>
                            <table class="table table-horizontal table-hover">
                                <tr>
                                    <th scope="row"><?= __('Username') ?></th>
                                    <td class="text-right"><?= h($user->username) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Business') ?></th>
                                    <td><?= $user->has('business') ? $this->Html->link($user->business->name, ['controller' => 'Accounts', 'action' => 'view', $user->business->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Role') ?></th>
                                    <td><?= $userRoles[$user->role]['name'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Account Created') ?></th>
                                    <td><?= h($user->created) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Confirmed') ?></th>
                                    <td><?= $user->confirmed ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Locked') ?></th>
                                    <td><?= $user->locked ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'; ?></td>
                                </tr>
                            </table>
                            <h3>User Personal Information</h3>
                            <table class="table table-horizontal table-hover">
                                <tr>
                                    <th scope="row"><?= __('First Name') ?></th>
                                    <td><?= h($user->first_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Last Name') ?></th>
                                    <td><?= h($user->last_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Email') ?></th>
                                    <td><?= h($user->email) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Phone') ?></th>
                                    <td><?= h($user->phone) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Resource Path') ?></th>
                                    <td><?= h($user->resource_path) ?></td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--

<div class="businesses index large-9 medium-8 columns content">
    <h3><?= __('Businesses') ?></h3>
    <div><?= $this->Html->link(__('New Business'), ['action' => 'add'], ['class' => 'button']) ?></div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('street') ?></th>
                <th scope="col"><?= $this->Paginator->sort('street2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businesses as $business): ?>
            <tr>
                <td><?= $this->Number->format($business->id) ?></td>
                <td><?= h($business->name) ?></td>
                <td><?= h($business->street) ?></td>
                <td><?= h($business->street2) ?></td>
                <td><?= h($business->city) ?></td>
                <td><?= h($business->state) ?></td>
                <td><?= h($business->zip) ?></td>
                <td><?= h($business->created) ?></td>
                <td><?= h($business->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $business->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $business->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
-->
<!--


<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Business') ?></th>
            <td><?= $user->has('business') ? $this->Html->link($user->business->name, ['controller' => 'Businesses', 'action' => 'view', $user->business->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resource Path') ?></th>
            <td><?= h($user->resource_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $this->Number->format($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Confirmed') ?></th>
            <td><?= $user->confirmed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locked') ?></th>
            <td><?= $user->locked ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Batches') ?></h4>
        <?php if (!empty($user->batches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Growth Profile Id') ?></th>
                <th scope="col"><?= __('Plant Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Plant Date') ?></th>
                <th scope="col"><?= __('Harvest Date') ?></th>
                <th scope="col"><?= __('Watched') ?></th>
                <th scope="col"><?= __('Testing Status') ?></th>
                <th scope="col"><?= __('Resource Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->batches as $batches): ?>
            <tr>
                <td><?= h($batches->id) ?></td>
                <td><?= h($batches->user_id) ?></td>
                <td><?= h($batches->growth_profile_id) ?></td>
                <td><?= h($batches->plant_id) ?></td>
                <td><?= h($batches->name) ?></td>
                <td><?= h($batches->description) ?></td>
                <td><?= h($batches->quantity) ?></td>
                <td><?= h($batches->plant_date) ?></td>
                <td><?= h($batches->harvest_date) ?></td>
                <td><?= h($batches->watched) ?></td>
                <td><?= h($batches->testing_status) ?></td>
                <td><?= h($batches->resource_path) ?></td>
                <td><?= h($batches->created) ?></td>
                <td><?= h($batches->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Batches', 'action' => 'view', $batches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Batches', 'action' => 'edit', $batches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Batches', 'action' => 'delete', $batches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Growth Profiles') ?></h4>
        <?php if (!empty($user->growth_profiles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Plant Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->growth_profiles as $growthProfiles): ?>
            <tr>
                <td><?= h($growthProfiles->id) ?></td>
                <td><?= h($growthProfiles->user_id) ?></td>
                <td><?= h($growthProfiles->plant_id) ?></td>
                <td><?= h($growthProfiles->name) ?></td>
                <td><?= h($growthProfiles->description) ?></td>
                <td><?= h($growthProfiles->created) ?></td>
                <td><?= h($growthProfiles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GrowthProfiles', 'action' => 'view', $growthProfiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GrowthProfiles', 'action' => 'edit', $growthProfiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GrowthProfiles', 'action' => 'delete', $growthProfiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthProfiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notes') ?></h4>
        <?php if (!empty($user->notes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Step Id') ?></th>
                <th scope="col"><?= __('Batch Id') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->notes as $notes): ?>
            <tr>
                <td><?= h($notes->id) ?></td>
                <td><?= h($notes->user_id) ?></td>
                <td><?= h($notes->step_id) ?></td>
                <td><?= h($notes->batch_id) ?></td>
                <td><?= h($notes->body) ?></td>
                <td><?= h($notes->created) ?></td>
                <td><?= h($notes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notes', 'action' => 'view', $notes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notes', 'action' => 'edit', $notes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notes', 'action' => 'delete', $notes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Plants') ?></h4>
        <?php if (!empty($user->plants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Resource Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->plants as $plants): ?>
            <tr>
                <td><?= h($plants->id) ?></td>
                <td><?= h($plants->user_id) ?></td>
                <td><?= h($plants->name) ?></td>
                <td><?= h($plants->description) ?></td>
                <td><?= h($plants->resource_path) ?></td>
                <td><?= h($plants->created) ?></td>
                <td><?= h($plants->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Plants', 'action' => 'view', $plants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Plants', 'action' => 'edit', $plants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Plants', 'action' => 'delete', $plants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reports') ?></h4>
        <?php if (!empty($user->reports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Batch Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->reports as $reports): ?>
            <tr>
                <td><?= h($reports->id) ?></td>
                <td><?= h($reports->user_id) ?></td>
                <td><?= h($reports->batch_id) ?></td>
                <td><?= h($reports->name) ?></td>
                <td><?= h($reports->description) ?></td>
                <td><?= h($reports->created) ?></td>
                <td><?= h($reports->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
-->
