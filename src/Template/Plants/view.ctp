<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
?>
<nav id="page-navbar" class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div>
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="far fa-ellipsis-v visible-on-sidebar-regular"></i>
                    <i class="far fa-bars visible-on-sidebar-mini"></i>
                </button>
            </div>
            <a class="navbar-brand"><?= __('View Plant') ?></a>
        </div>
        <div class="form-inline">
            <?= $this->Html->link(__('<i class="fas fa-fw fa-pencil-alt"></i> Edit'), ['action' => 'edit', $plant->id], ['escape' => false, 'class' => 'btn btn-rose']) ?>
            <?= $this->Form->postLink(__('<i class="fas fa-fw fa-trash"></i> Delete'), ['action' => 'delete', $plant->id], ['escape' => false, 'class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete the plant named: {0}?', $plant->name)]) ?>
        </div>
    </div>
</nav>

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-leaf"></i> <?= __('Plant Details') ?>
                    </h4>

                    <div class="card-content">
                        <h4 class="card-title">&nbsp;</h4>
                        <div class="table-responsive">
                            <table class="table vertical-table">
                                <tbody>
                                <tr>
                                    <th><?= __('Name') ?></th>
                                    <td class="text-right"><?= h($plant->name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Description') ?></th>
                                    <td class="text-right"><?= h($plant->description) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Resource Path (Image)') ?></th>
                                    <td class="text-right"><?= h($plant->resource_path) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created By') ?></th>
                                    <td class="text-right"><?= $plant->has('user') ? $this->Html->link($plant->user->first_name . ' ' . $plant->user->last_name, ['controller' => 'Users', 'action' => 'view', $plant->user->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Created On') ?></th>
                                    <td class="text-right"><?= h($plant->created) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Last Modified') ?></th>
                                    <td class="text-right"><?= h($plant->modified) ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-box-full"></i> <?= __('Batches Using This Plant') ?>
                    </h4>

                    <div class="card-content">
                        <h4 class="card-title">&nbsp;</h4>
                        <div class="table-responsive">
                            <?php if (!empty($plant->batches)): ?>
                                <table cellpadding="0" cellspacing="0" class="table">
                                    <tr>
                                        <th scope="col"><?= __('Name') ?></th>
                                        <th scope="col"><?= __('Watched') ?></th>
                                        <th scope="col"><?= __('Description') ?></th>
                                        <th class="text-right" scope="col"><?= __('Created') ?></th>
                                    </tr>
                                    <?php foreach ($plant->batches as $batches): ?>
                                        <tr>
                                            <td><?= $this->Html->link(h($batches->name), ['controller' => 'Batches', 'action' => 'view', $batches->id]) ?></td>
                                            <td><?= h($batches->watched) ?></td>
                                            <td><?= h($batches->description) ?></td>
                                            <td class="text-right"><?= h($batches->created) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php else: ?>
                                <div>There are no batches using this plant.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-hand-holding-seedling"></i> <?= __('Growth Profiles Using This Plant') ?>
                    </h4>

                    <div class="card-content">
                        <h4 class="card-title">&nbsp;</h4>
                        <div class="table-responsive">
                            <?php if (!empty($plant->growth_profiles)): ?>
                                <table cellpadding="0" cellspacing="0" class="table">
                                    <tr>
                                        <th scope="col"><?= __('Name') ?></th>
                                        <th scope="col"><?= __('Description') ?></th>
                                        <th class="text-right" scope="col"><?= __('Created') ?></th>
                                    </tr>
                                    <?php foreach ($plant->growth_profiles as $growthProfiles): ?>
                                        <tr>
                                            <td><?= $this->Html->link(h($growthProfiles->name), ['controller' => 'GrowthProfiles', 'action' => 'view', $growthProfiles->id]) ?></td>
                                            <td><?= h($growthProfiles->description) ?></td>
                                            <td class="text-right"><?= h($growthProfiles->created) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php else: ?>
                                <div>There are no growth profiles using this plant.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>






<!--
<div class="plants view large-9 medium-8 columns content">
    <h3><?= h($plant->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $plant->has('user') ? $this->Html->link($plant->user->id, ['controller' => 'Users', 'action' => 'view', $plant->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($plant->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($plant->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resource Path') ?></th>
            <td><?= h($plant->resource_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($plant->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($plant->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($plant->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Batches') ?></h4>
        <?php if (!empty($plant->batches)): ?>
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
            <?php foreach ($plant->batches as $batches): ?>
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
        <?php if (!empty($plant->growth_profiles)): ?>
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
            <?php foreach ($plant->growth_profiles as $growthProfiles): ?>
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
</div> -->
