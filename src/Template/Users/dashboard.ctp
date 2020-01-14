<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!--<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Dashboard') ?></h3>
    <p>Dashboard Content</p>
</div>-->
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div>
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="far fa-ellipsis-v visible-on-sidebar-regular"></i>
                            <i class="far fa-bars visible-on-sidebar-mini"></i>
                        </button>
                    </div>
                    <!--<a class="navbar-brand" href=""><?= __('Dashboard') ?></a>-->
                    <?= $this->Html->link(__('<i class="fas fa-tachometer-alt"></i> Dashboard'), ['controller' => 'Users', 'action' => 'dashboard'], ['class' => 'navbar-brand', 'escape' => false]) ?>
                </div>





                <!--<div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> Username
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit"></i> Edit Profile</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-cogs"></i> User Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-sign-out"></i> Sign Out</a>
                    </div>
                </div>-->
            </div>
        </nav>









        <div class="content">
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <!--<h3>Watched Batches</h3>
                <br>
                <div class="row" style="flex-wrap: nowrap; overflow-x: auto; overflow-y: visible; padding-top: 70px; margin-top: -70px;">
                    <div class="col-md-4">
                        <div class="card card-product" data-count="0">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="img/tomatoes.jpeg">
                                </a>
                            </div>

                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="fas fa-construction"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo">Fall Tomatoes</a>
                                </h4>
                                <div class="card-description">
                                    Batch of tomatoes planted in the Fall.
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center">Germination<br />Pre-germ</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-product" data-count="0">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="img/tomatoes.jpeg">
                                </a>
                            </div>

                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="fas fa-construction"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo">Fall Tomatoes</a>
                                </h4>
                                <div class="card-description">
                                    Batch of tomatoes planted in the Fall.
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center">Growing<br />Rack 4</h4>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="img/tomatoes.jpeg">
                                </a>
                            </div>

                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="fas fa-construction"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo">Summer Tomatoes</a>
                                </h4>
                                <div class="card-description">
                                    Batch of tomatoes planted in the summer.
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center">Growing<br />Rack 7</h4>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="img/tomatoes.jpeg">
                                </a>
                            </div>

                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="fas fa-construction"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo">Spring Tomatoes</a>
                                </h4>
                                <div class="card-description">
                                    Batch of tomatoes planted in the spring.
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center">Post Growth<br />Packaging</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <h3>Recent Batches</h3>
                <br>
                <div class="row" style="flex-wrap: nowrap; overflow-x: auto; overflow-y: visible; padding-top: 70px; margin-top: -70px;">
                    <div class="col-md-4">
                        <div class="card card-product" data-count="0">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="img/tomatoes.jpeg">
                                </a>
                            </div>

                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="fas fa-construction"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo">Fall Tomatoes</a>
                                </h4>
                                <div class="card-description">
                                    Batch of tomatoes planted in the Fall.
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center">30 Plants</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-product" data-count="0">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="img/tomatoes.jpeg">
                                </a>
                            </div>

                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="fas fa-construction"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo">Fall Tomatoes</a>
                                </h4>
                                <div class="card-description">
                                    Batch of tomatoes planted in the Fall.
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center">30 Plants</h4>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="img/tomatoes.jpeg">
                                </a>
                            </div>

                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="fas fa-construction"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo">Summer Tomatoes</a>
                                </h4>
                                <div class="card-description">
                                    Batch of tomatoes planted in the summer.
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center">60 Plants</h4>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <a href="#pablo">
                                    <img class="img" src="img/tomatoes.jpeg">
                                </a>
                            </div>

                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="fas fa-construction"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="fas fa-paint-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo">Spring Tomatoes</a>
                                </h4>
                                <div class="card-description">
                                    Batch of tomatoes planted in the spring.
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-center">110 Plants</h4>

                            </div>
                        </div>
                    </div>
                </div>
-->

                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div id="" class="card-header" data-background-color="rose" data-header-animation="true">
                                <canvas id="chart1"></canvas>
                            </div>
                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>

                                    <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Refresh">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Change Date">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">Plants In Production</h4>
                                <p class="category">Across All Batches</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-clock"></i> updated 18 minutes ago
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-chart" data-count="0">
                            <div id="" class="card-header" data-background-color="green" data-header-animation="true">
                                <canvas id="chart2"></canvas>
                            </div>
                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>

                                    <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Refresh">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Change Date">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">Daily Sales</h4>
                                <p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-clock"></i> updated 4 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-chart" data-count="0">
                            <div id="" class="card-header" data-background-color="blue" data-header-animation="true">
                                <canvas id="chart3"></canvas>
                            </div>
                            <div class="card-content">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>

                                    <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Refresh">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Change Date">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">Completed Tasks</h4>
                                <p class="category">Last Campaign Performance</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-clock"></i> campaign sent 2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="orange">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Bookings</p>
                                <h3 class="card-title">184</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-exclamation-triangle text-danger"></i> <a href="#pablo">Get More Space...</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="fas fa-music"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Website Visits</p>
                                <h3 class="card-title">75.521</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-sync"></i> Tracked from Google Analytics
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="fas fa-store"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Revenue</p>
                                <h3 class="card-title">$34,245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-calendar-alt"></i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Followers</p>
                                <h3 class="card-title">+245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fas fa-update"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>










            </div>
        </div>


<script>
    /* Chart JS Elements */
    Chart.defaults.global.defaultFontColor = "#fff";
    Chart.defaults.global.defaultBorderColor = "#fff";
    Chart.defaults.global.legend.display = false;
    Chart.defaults.global.layout.padding = {
        left: 5,
        right: 20,
        top: 20,
        bottom: 0
    };
    var ctx = document.getElementById('chart1').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Chart 1',
                backgroundColor: '#ff4a8f',
                borderColor: '#982e4c',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {}
    });
    var ctx = document.getElementById('chart2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Chart 2',
                backgroundColor: '#84d988',
                borderColor: '#305932',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {

        }
    });
    var ctx = document.getElementById('chart3').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Chart 3',
                backgroundColor: '#28e5f9',
                borderColor: '#166b7a',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>
