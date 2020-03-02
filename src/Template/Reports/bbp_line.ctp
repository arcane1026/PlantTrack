<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
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
                <li class="form-inline">
                    <?= $this->Html->link(__('<i class="fas fa-plus"></i> Back'), ['action' => 'index'], ['escape' => false, 'class' => 'nav-link btn btn-rose']) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->



<div class="reports form large-9 large-8 columns content">

    <div class="card mb-3">
        <div class="card-header card-header-rose" data-header-animation="true">
            <div class="ct-chart" id="chart1" style = "height: 500px"></div>
        </div>
        <div class="card-body">
            <h4 class="card-title">Batches per Plant</h4>
            <p class="card-category"><?php echo $businessName ?></p>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">access_time</i> Report Generated
                <?php echo date("M,d,Y h:i:s A ", (time() - 3600 * 5))
                    . "by " . $activeUser['username'] ?>
            </div>
        </div>
    </div>
</div>
</div>


<!-- script that generates data for chart-->
<script>

    var data = {
        // A labels array that can contain any sort of values
        labels: [ <?php  foreach ($xLabels as $label) {
            echo('"' . $label . '"' . ' , ');
        }?>],
        // Our series array that contains series objects or in this case series data arrays
        series: [[ <?php  foreach ($yValues as $value) {
                echo('"' . $value . '"' . ' , ');
        }?>]]
           };
 console.log(data);


    // Create a new line chart object where as first parameter we pass in a selector
    // that is resolving to our chart container element. The Second parameter
    // is the actual data object.

</script>

<style>
    /*center chart div*/
    .center {
        margin: auto;
        width: 60%;
        padding: 10px;
    }


</style>
