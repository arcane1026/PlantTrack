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
            <a class="navbar-brand" href="#pablo"><?= __('View Notes: ' . $batch->name) ?></a>
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
                    <?= $this->Html->link(__('<i class="fas fa-fw fa-arrow-left"></i>'), ['action' => 'view', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-rose btn-large btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Back To Batch']) ?>
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
                            <i class="fas fa-sticky-note"></i>
                        </div>
                        <h4 class="card-title font-weight-bold">Notes

                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <?php foreach ($notes as $note): ?>
                                    <div class="col-lg-6 col-xl-4 d-flex align-items-stretch">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="text-nowrap float-left"><i class="fas fa-user"></i> <?= $note->user->username ?></h6>
                                                <h6 class="text-nowrap text-right float-right"><?= $note->step->stage->name ?></h6>
                                                <div class="clearfix"></div>
                                                <h6 class="text-nowrap text-right float-left" rel="tooltip" data-placement="bottom" title="" data-original-title="<?= $note->created->format('F d, Y') ?>"><i class="fas fa-clock"></i> <?= $note->created->format('m/d/Y') ?></h6>
                                                <h6 class="text-nowrap text-right float-right"><?= $note->step->name ?></h6>
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

    </div>
</div>
