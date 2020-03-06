<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch[]|\Cake\Collection\CollectionInterface $reports
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
            <a class="navbar-brand" href="#pablo"><?= __('Reports') ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-analytics"></i>
                        </div>
                        <h4 class="card-title"><?= __('Generate Reports') ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Report Type</th>
                                    <th>Report Description</th>
                                    <th>Generate!</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Batches per Plant</td>
                                    <td>Number of unique batches of every plant type your business cultivates.</td>
                                    <td><?= $this->Html->link(__('Get Report'), ['action' => 'BatchesPerPlant'], ['class' => 'nav-link btn btn-rose']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Average Yield per Batch </td>
                                    <td>Average yield per Batch Unit by Plant</td>
                                    <td><?= $this->Html->link(__('Get Report'), ['action' => 'batchYieldByPlant'], ['class' => 'nav-link btn btn-rose']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Batches per Employee</td>
                                    <td>Employee batch productivity report</td>
                                    <td><?= $this->Html->link(__('Get Report'), ['action' => 'employeeBatches'], ['class' => 'nav-link btn btn-rose']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Readings per Step for Batch</td>
                                    <td> Readings for steps for selected batch represented in line graph</td>
                                    <td><?= $this->Html->link(__('Get Report'), ['action' => 'batchReadingsLine'], ['class' => 'nav-link btn btn-rose']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Batches per Plant Pie</td>
                                    <td>The total number of batches per plant type represented in a line graph</td>
                                    <td><?= $this->Html->link(__('Get Report'), ['action' => 'bbpPie'], ['class' => 'nav-link btn btn-rose']) ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



