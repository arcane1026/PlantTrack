<!-- get some values from database for chart -->



<!-- script that generates data for chart-->
<script>

    var data = {
        // A labels array that can contain any sort of values
        labels: [ <?php  foreach($xLabels as $label){
            echo ('"'.$label.'"' . ' , ');
        }?>],
        // Our series array that contains series objects or in this case series data arrays
        series: [
            [<?php  foreach($yValues as $value){
                echo ($value . ',');
            }?>]
        ],

    };


    // Create a new line chart object where as first parameter we pass in a selector
    // that is resolving to our chart container element. The Second parameter
    // is the actual data object.

</script>

<p>Batches per plant for Tegridy farms</p>
<!-- div with actual chart -->

<div class="ct-chart ct-perfect-fourth" id="chart2"></div>

<style>
    .ct-series-a .ct-bar {
        /* Colour of your bars */
        stroke: red !important;
        /* The width of your bars */
        stroke-width: 20px;
    }</style>


