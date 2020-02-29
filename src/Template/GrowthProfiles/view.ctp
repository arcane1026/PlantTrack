<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrowthProfile $growthProfile
 */
?>

<?= $this->Form->create($growthProfile) ?>
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
            <a class="navbar-brand" href="#pablo"><?= __('View Growth Profile') ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form"></form> <?php // FORM MUST EXIST FOR UI TO WORK ?>
            <ul class="navbar-nav">
                <li class="nav-item">

                </li>
                <li class="nav-item">
                    <?= $this->Form->postLink(__('<i class="fas fa-fw fa-trash"></i>'), ['action' => 'delete', $growthProfile->id], ['escape' => false, 'class' => 'btn btn-sm btn-danger btn-icon-only', 'confirm' => __('Are you sure you want to delete the growth profile named: {0}?', $growthProfile->name), 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Delete Growth Profile']) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <?= $this->Flash->render(); ?>
        <!--<div class="text-center">
            <div class="h3 no-margin">Growth Profile: <?= h($growthProfile->name) ?></div>
        </div>-->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-timeline card-plain" style="margin-top: 0;">
                    <div class="card-body">
                        <ul class="timeline" style="margin-top: 0;">
                            <li class="timeline-start">
                                <div class="timeline-panel">
                                    <div class="timeline-heading">

                                        <div class="h3 no-margin"><?= h($growthProfile->name) ?></div>
                                    </div>
                                    <h6>
                                        <div><?= h($growthProfile->description) ?></div><br />
                                        <div><?= ($growthProfile->duration > 24) ? h((int)($growthProfile->duration / 24)) . ' days ' . $growthProfile->duration % 24 . ' hours' : h($growthProfile->duration) . ' hours' ?> total duration</div>
                                    </h6>
                                    <div class="card-footer">
                                        <?= $this->Html->link(__('<i class="fas fa-plus"></i>'), ['action' => 'addStage', $growthProfile->id], ['escape' => false, 'class' => 'btn btn-sm btn-link', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'New Stage']) ?>
                                        <?= $this->Html->link(__('<i class="fas fa-edit"></i>'), ['action' => 'edit', $growthProfile->id], ['escape' => false, 'class' => 'btn btn-sm btn-link', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Edit Growth Profile']) ?>
                                        <?= $this->Form->postLink(__('<i class="fas fa-trash"></i>'), ['action' => 'delete', $growthProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthProfile->id), 'escape' => false, 'class' => 'btn btn-sm btn-link', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Delete Growth Profile']) ?>
                                    </div>
                                </div>
                            </li>
                            <?php $stageCount = 0; foreach ($growthProfile->stages as $stage): $stageCount++; ?>
                                <li class="<?= ($stageCount%2 == 0) ? '' : ' timeline-inverted'?>">
                                    <div class="timeline-badge timeline-pill badge-success">
                                        <i class="fas fa-seedling"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <div class="h3 no-margin"><?= h($stage->name) ?></div>
                                            <p><?= h($stage->description) ?></p>
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr class="h5"></td>
                                                    <td><div>Duration:</div></td>
                                                    <td class="text-right text-nowrap"><div><?= ($stage->duration > 24) ? h((int)($stage->duration / 24)) . ' days ' . $stage->duration % 24 . ' hours' : h($stage->duration) . ' hours' ?></div></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="timeline-body">
                                            <div class="h5 no-margin"><u class="font-weight-bold">Steps</u></div>
                                            <table class="table table-hover">
                                                <tbody class="sortable">
                                                    <?php foreach ($stage->steps as $step): ?>
                                                        <tr id="<?= $step->id ?>" class="h5"></td>
                                                            <td><div class="handle"><i class="far fa-grip-lines"></i></div></td>
                                                            <td style="width: 100%; "><div rel="tooltip" data-placement="bottom" title="" data-original-title="<?= h($step->description) ?>"><?= h($step->name) ?></div></td>
                                                            <td class="text-right text-nowrap"><div><?= h($step->duration) ?> h</div></td>
                                                            <td class="text-right">
                                                                <div class="btn-group btn-group-sm">
                                                                    <?= $this->Html->link(__('<i class="fas fa-edit"></i>'), ['action' => 'editStep', $step->id], ['escape' => false, 'class' => 'btn btn-sm btn-link', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Edit Step']) ?>
                                                                    <?= ($stage->total_steps > 1) ? $this->Form->postLink(__('<i class="fas fa-trash"></i>'), ['action' => 'deleteStep', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthProfile->id), 'escape' => false, 'class' => 'btn btn-sm btn-link', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Delete Step']) : '' ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <div class="card-footer">
                                                <?= $this->Html->link(__('<i class="fas fa-plus"></i>'), ['action' => 'addStep', $stage->id], ['class' => 'btn btn-sm btn-link', 'escape' => false, 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Add Step']) ?>
                                                <?= $this->Html->link(__('<i class="fas fa-edit"></i>'), ['action' => 'editStage', $stage->id], ['class' => 'btn btn-sm btn-link', 'escape' => false, 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Edit Stage']) ?>
                                                <?= ($growthProfile->total_stages > 1) ? $this->Form->postLink(__('<i class="fas fa-trash"></i>'), ['action' => 'deleteStage', $stage->id], ['class' => 'btn btn-sm btn-link', 'escape' => false, 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Delete Stage', 'confirm' => __('Are you sure you want to delete the stage {0}?', $stage->name)]) : '<div style="width: 29.5px;"></div>' ?>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li class="timeline-end">
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <div class="h3 no-margin">Growth Profile End</div>
                                    </div>
                                    <h6></h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<!--

<div class="growthProfiles view large-9 medium-8 columns content">
    <h3><?= h($growthProfile->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $growthProfile->has('user') ? $this->Html->link($growthProfile->user->id, ['controller' => 'Users', 'action' => 'view', $growthProfile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plant') ?></th>
            <td><?= $growthProfile->has('plant') ? $this->Html->link($growthProfile->plant->name, ['controller' => 'Plants', 'action' => 'view', $growthProfile->plant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($growthProfile->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($growthProfile->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($growthProfile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($growthProfile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($growthProfile->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Batches') ?></h4>
        <?php if (!empty($growthProfile->batches)): ?>
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
            <?php foreach ($growthProfile->batches as $growthProfilees): ?>
            <tr>
                <td><?= h($growthProfilees->id) ?></td>
                <td><?= h($growthProfilees->user_id) ?></td>
                <td><?= h($growthProfilees->growth_profile_id) ?></td>
                <td><?= h($growthProfilees->plant_id) ?></td>
                <td><?= h($growthProfilees->name) ?></td>
                <td><?= h($growthProfilees->description) ?></td>
                <td><?= h($growthProfilees->quantity) ?></td>
                <td><?= h($growthProfilees->plant_date) ?></td>
                <td><?= h($growthProfilees->harvest_date) ?></td>
                <td><?= h($growthProfilees->watched) ?></td>
                <td><?= h($growthProfilees->testing_status) ?></td>
                <td><?= h($growthProfilees->resource_path) ?></td>
                <td><?= h($growthProfilees->created) ?></td>
                <td><?= h($growthProfilees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Batches', 'action' => 'view', $growthProfilees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Batches', 'action' => 'edit', $growthProfilees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Batches', 'action' => 'delete', $growthProfilees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $growthProfilees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stages') ?></h4>
        <?php if (!empty($growthProfile->stages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Growth Profile Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($growthProfile->stages as $stages): ?>
            <tr>
                <td><?= h($stages->id) ?></td>
                <td><?= h($stages->growth_profile_id) ?></td>
                <td><?= h($stages->name) ?></td>
                <td><?= h($stages->description) ?></td>
                <td><?= h($stages->created) ?></td>
                <td><?= h($stages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stages', 'action' => 'view', $stages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stages', 'action' => 'edit', $stages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stages', 'action' => 'delete', $stages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div> -->
