<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch[]|\Cake\Collection\CollectionInterface $batches
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
            <a class="navbar-brand" href="#pablo">Testing</a>
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
                    <?= '' // $this->Html->link(__('<i class="fas fa-fw fa-comment-alt-lines"></i>'), ['action' => 'timeline'], ['escape' => false, 'class' => 'btn btn-sm btn-link btn-large btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Timeline View']) ?>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <h4 class="card-title">Passed Tests</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                </thead>
                                <tbody>
                                <?php if (count($batches['passed']) > 0): ?>
                                <?php foreach ($batches['passed'] as $batch): ?>
                                    <tr>
                                        <td style="width: 100%"><?= $this->Html->link(__($batch->name), ['controller' => 'Batches','action' => 'view', $batch->id]) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <div>No batches have passed tests.</div>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-thumbs-down"></i>
                        </div>
                        <h4 class="card-title">Failed Tests</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                </thead>
                                <tbody>
                                <?php if (count($batches['failed']) > 0): ?>
                                <?php foreach ($batches['failed'] as $batch): ?>
                                    <tr>
                                        <td style="width: 100%"><?= $this->Html->link(__($batch->name), ['controller' => 'Batches','action' => 'view', $batch->id]) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <div>No batches have failed tests.</div>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-ban"></i>
                        </div>
                        <h4 class="card-title">Untested</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                </thead>
                                <tbody>
                                <?php if (count($batches['unsent']) > 0): ?>
                                <?php foreach ($batches['unsent'] as $batch): ?>
                                    <tr>
                                        <td style="width: 100%"><?= $this->Html->link(__($batch->name), ['controller' => 'Batches','action' => 'view', $batch->id]) ?></td>
                                        <td><?= $this->Html->link('<i class="fas fa-sync"></i>', ['action' => 'setInProgress', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-warning', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Set In Progress']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <div>No batches are waiting to be sent.</div>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <h4 class="card-title">In Progress</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                </thead>
                                <tbody>
                                <?php if (count($batches['inprogress']) > 0): ?>
                                <?php foreach ($batches['inprogress'] as $batch): ?>
                                    <tr>
                                        <td style="width: 100%"><?= $this->Html->link(__($batch->name), ['controller' => 'Batches', 'action' => 'view', $batch->id]) ?></td>
                                        <td><?= $this->Html->link('<i class="fas fa-thumbs-up"></i>', ['action' => 'setPassed', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-success', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Set Passed']) ?></td>
                                        <td><?= $this->Html->link('<i class="fas fa-thumbs-down"></i>', ['action' => 'setFailed', $batch->id], ['escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Set Failed']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <div>No batches are being tested now.</div>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
