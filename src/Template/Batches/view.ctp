<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch $batch
 */
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo"><?= __('View Batch') ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form"></form> <?php // FORM MUST EXIST FOR UI TO WORK ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-comment-alt-lines"></i>'), ['action' => 'timeline', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-link btn-large btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Timeline View']) ?>
                </li>
                <?php if ($batch->get('step_id') === null && $batch->get('plant_date') === null): ?>
                    <li class="nav-item">
                        <?= $this->Html->link(__('<i class="fas fa-fw fa-hand-holding-seedling"></i>'), ['action' => 'plant', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-rose btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Plant Batch']) ?>
                    </li>
                <?php elseif ($batch->get('step_id') !== null): ?>
                    <li class="nav-item">
                        <?= $this->Html->link(__('<i class="fas fa-fw fa-sticky-note"></i>'), ['action' => 'add_note', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-rose', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Add Note']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link(__('<i class="fas fa-fw fa-thermometer-quarter"></i>'), ['action' => 'add_reading', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-rose', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Add Reading']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link(__('<i class="fas fa-fw fa-arrow-from-left"></i>'), ['action' => 'next_step', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-rose btn-large btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Move Batch to Next Step']) ?>
                    </li>
                <?php else: ?>
                <?php endif; ?>
                <li class="nav-item">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-qrcode"></i>'), ['action' => 'qr_code', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-rose', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Generate QR Code']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-edit"></i>'), ['action' => 'edit', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-rose btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Edit Batch']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Form->postLink(__('<i class="fas fa-fw fa-trash"></i>'), ['action' => 'delete', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-danger btn-icon-only', 'confirm' => __('Are you sure you want to delete the batch named: {0}?', $batch->name), 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Delete Batch']) ?>
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
                <div class="card batch-card">
                    <div class="card-header card-header-rose card-header-icon">

                        <div class="card-icon">
                            <i class="fas fa-box-full"></i>
                        </div>
                        <h4 class="card-title font-weight-bold"><?= h($batch->name) ?>
                            <div class="batch-description col-md-6 col-sm-6 font-weight-light" style="color: #000;"
                                 rel="tooltip" data-placement="bottom" title=""
                                 data-original-title="<?= h($batch->description) ?>"><?= h($batch->description) ?></div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table table-horizontal table-hover">
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Plant') ?></th>
                                                <td class="text-right text-nowrap"><?= $batch->has('plant') ? $this->Html->link(h($batch->plant->name), ['controller' => 'Plants', 'action' => 'view', $batch->plant->id]) : '' ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Growth Profile') ?></th>
                                                <td class="text-right text-nowrap"><?= $batch->has('growth_profile') ? $this->Html->link(h($batch->growth_profile->name), ['controller' => 'GrowthProfiles', 'action' => 'view', $batch->growth_profile->id]) : ''  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Created By') ?></th>
                                                <td class="text-right text-nowrap"><?= $batch->has('user') ? $this->Html->link($batch->user->first_name . ' ' . $batch->user->last_name, ['controller' => 'Users', 'action' => 'view', $batch->user->id]) : '' ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Planted') ?></th>
                                                <td class="text-right text-nowrap">
                                                    <span class="pt-tooltip"
                                                          <?= (!empty($batch->plant_date)) ? ' rel="tooltip" data-placement="bottom" title="" data-original-title="' . h($batch->plant_date->format('F d, Y')) . '"' : '' ?>><?= (!empty($batch->plant_date)) ? h($batch->plant_date->format('m/d/Y')) : 'Not Planted' ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Est Completion') ?></th>
                                                <td class="text-right text-nowrap"><?= 'Unknown'//h($batch->modified)  ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table table-horizontal table-hover">
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Stage') ?></th>
                                                <td class="text-right text-nowrap"><?= (!empty($batch->current_stage)) ? h($batch->current_stage->name) : 'Not Planted' ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Stage Progress') ?></th>
                                                <td class="text-right text-nowrap"><?= (!empty($batch->current_stage)) ? h($batch->current_stage->percent_complete) . '%' : 'Not Planted' ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Step') ?></th>
                                                <td class="text-right text-nowrap"><?= (!empty($batch->current_step)) ? h($batch->current_step->name) : 'Not Planted' ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Stage Start') ?></th>
                                                <td class="text-right text-nowrap">
                                                    <div class="pt-tooltip"
                                                         <?= (!empty($batch->plant_date)) ? ' rel="tooltip" data-placement="bottom" title="" data-original-title="' . h($batch->plant_date->format('F d, Y')) . '"' : '' ?>><?= (!empty($batch->plant_date)) ? h($batch->plant_date->format('m/d/Y')) : 'Not Planted' ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-nowrap"><?= __('Est Stage End') ?></th>
                                                <td class="text-right text-nowrap"><?= 'Unknown'//h($batch->modified)  ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card"
                                         style="width: 100%; height: 100%; background-color: #fcfcfc; margin-top: 0px; margin-bottom: 0px; background-image: url('http://static.coastlineapplications.com/plant_track/planttrack_logo_icon_cream.png'); background-position:center center; background-size: contain; background-repeat: no-repeat"></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <?php foreach ($batch->growth_profile->stages as $stage): ?>
                                    <div class="col-md-6 col-lg-4 col-xl-4 col-sm-12 d-flex align-items-stretch">
                                        <div class="card">
                                            <div class="card-header h3 text-center font-weight-bold text-nowrap"><?= $stage->name ?></div>
                                            <div class="h2 text-center font-weight-bold <?= 'text-' . $stage->status; ?>"><?= $stage->percent_complete . '&percnt;' ?></div>
                                            <div class="card-body">
                                                <div class="container-fluid">
                                                    <div class="row batch-steps" style="justify-content: space-evenly">
                                                        <?php $counter = 1;
                                                        foreach ($stage->steps as $step): ?>
                                                            <?= $this->Html->link((string)$counter, ['action' => 'timeline', '#' => $step->id, $batch->id], ['escape' => false, 'class' => 'btn btn-just-icon btn-fab btn-round btn-' . $step->status, 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => $step->name]) ?>
                                                            <?php $counter++; endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card batch-card">
                    <div class="card-header card-header-rose card-header-icon">

                        <div class="card-icon">
                            <i class="fas fa-sticky-note"></i>
                        </div>
                        <h4 class="card-title font-weight-bold">Notes
                            <?= $this->Html->link('All Notes', ['action' => 'view-notes', $batch->id], ['escape' => false, 'class' => 'btn btn-rose float-right']) ?>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row" >
                                <?php foreach ($notes as $note): ?>
                                    <div class="col-md-4 d-flex align-items-stretch">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="text-nowrap float-left"><i class="fas fa-user"></i> <?= $note->user->username ?></h6>
                                                <h6 class="text-nowrap text-right float-right" rel="tooltip" data-placement="bottom" title="" data-original-title="<?= $note->created->format('F d, Y') ?>"><i class="fas fa-clock"></i> <?= $note->created->format('m/d/Y') ?></h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="h4 no-margin"><?= $note->body ?></div>
                                            </div>
                                            <div class="card-footer">
                                                <?= ($activeUser['role'] === 2 || $activeUser['id'] === $note->user_id) ? $this->Html->link(__('<i class="fas fa-edit"></i>'), ['controller' => 'Batches', 'action' => 'edit_note', $note->id], ['escape' => false, 'class' => 'btn btn-sm btn-link', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Edit Note']) : '' ?>
                                                <?= ($activeUser['role'] === 2 || $activeUser['id'] === $note->user_id) ? $this->Form->postLink(__('<i class="fas fa-trash"></i>'), ['action' => 'delete', $note->id], ['confirm' => __('Are you sure you want to delete # {0}?', $note->id), 'escape' => false, 'class' => 'btn btn-sm btn-link', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Delete Note']) : '' ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card batch-card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-thermometer-quarter"></i>
                        </div>
                        <h4 class="card-title font-weight-bold">Readings
                            <?= $this->Html->link('All Readings', ['action' => 'view-notes', $batch->id], ['escape' => false, 'class' => 'btn btn-rose float-right']) ?>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <?php foreach ($readings as $reading): ?>
                                    <div class="col-md-4">
                                        <div class="table-responsive">
                                            <table class="table table-horizontal table-hover">
                                                <tr>
                                                    <th scope="row" class="text-nowrap"><?= __('Reading Type') ?></th>
                                                    <td class="text-right text-nowrap"><?= $reading->name ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-nowrap"><?= __('Reading Value') ?></th>
                                                    <td class="text-right text-nowrap"><?= $reading->value ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-nowrap"><?= __('Date Taken') ?></th>
                                                    <td class="text-right text-nowrap"><?= $reading->created ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
