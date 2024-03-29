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
                <form class="navbar-form"></form> <?php // FORM MUST EXIST FOR UI TO WORK ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?= $this->Html->link(__('<i class="fas fa-fw fa-arrow-left"></i>'), ['action' => 'index'], ['escape' => false, 'class' => 'btn btn-sm btn-rose btn-icon-only', 'data-placement' => 'bottom', 'title' => '', 'rel' => 'tooltip', 'data-original-title' => 'Back to Reports']) ?>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->



<div class="reports form large-9 large-8 columns content" style = "width: 60%; margin: 0 auto;">
    <div class="card mb-3" style="padding-top: 30px">
        <center>  <h4 class="navbar-brand" style="font-size: 50px">Batches per Plant</h4></center>
        <div class="ct-chart" id = "chart3" style="height:500px" ></div>
        <div class="card-body">
            <p class="card-category"><?php echo $businessName ?></p>
            <div class="stats">
                <i class="far fa-clock text-gray"></i> Report Generated
                <?php echo date("F d, Y, h:i A ", (time() - 3600 * 5))
                    . "by " . $activeUser['username'] ?>
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
        series: [
            <?php  foreach ($yValues as $value) {
            echo($value . ',');
        }?>
        ],
    };

    var options = {
        chartPadding: 30
    };

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

    .ct-chart .ct-series-a .ct-slice-pie {
        fill: #e91e63;
    }

    .ct-chart .ct-series-b .ct-slice-pie {
        fill: #62e91e;
    }

    .ct-chart .ct-series-c .ct-slice-pie {
        fill: #1ea9e9;
    }

    .ct-chart .ct-series-d .ct-slice-pie {
        fill: #e9621e;
    }

    .ct-chart .ct-series-e .ct-slice-pie {
        fill: #e9c71e;
    }

    .ct-chart .ct-series-f .ct-slice-pie {
        fill: #d33d44;
    }
    .ct-label {
        font-size: 20px;
        font-family: Roboto, Helvetica, Arial, sans-serif !important;
        color: black !important;
        text-align: center !important;
        font-weight: bold;
    }
</style>
