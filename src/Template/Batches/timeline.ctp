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
            <a class="navbar-brand" href="#pablo"><?= __('Timeline') ?></a>
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
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-table"></i>'), ['action' => 'view', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-link btn-large btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Table View']) ?>
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
        <div class="text-center">
            <div class="h3 no-margin"><?= h($batch->name) ?> Timeline</div>
            <div class="h4 no-margin">Growth Profile: <?= h($batch->growth_profile->name) ?></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-timeline card-plain">
                    <div class="card-body">
                        <ul class="timeline">
                            <li class="timeline-start">
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <div class="h3 no-margin">Timeline Start</div>
                                    </div>
                                    <h6>
                                         <?= (!empty($batch->plant_date)) ? '<i class="fas fa-clock"></i> Planted: ' . $batch->plant_date->format('F d, Y') : 'Not Yet Planted' ?>
                                    </h6>
                                </div>
                            </li>
                            <?php $stageCount = 0; foreach ($batch->growth_profile->stages as $stage): $stageCount++; ?>
                                <li <?= ($stageCount%2 == 0) ? '' : 'class="timeline-inverted"'?>>
                                    <div class="timeline-badge timeline-pill bg-<?= $stage->status ?>">
                                        <i class="fas fa-seedling"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <div class="h3 no-margin"><?= h($stage->name) ?></div>
                                            <p><?= h($stage->description) ?></p>
                                        </div>
                                        <div class="timeline-body">
                                            <div class="h4 no-margin">Steps</div>
                                            <?php foreach ($stage->steps as $step): ?>
                                            <div id="<?= $step->id ?>">
                                                <span class="badge badge-pill badge-<?= $step->status ?>"><?= $stageStepStatuses[$step->status] ?></span>
                                                <span rel="tooltip" data-placement="bottom" title="" data-original-title="<?= h($step->description) ?>"><?= h($step->name) ?></span>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li class="timeline-end">
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <div class="h3 no-margin">Timeline End</div>
                                    </div>
                                    <h6>

                                    </h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
