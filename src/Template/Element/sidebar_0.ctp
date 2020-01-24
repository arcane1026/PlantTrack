<?php
?>
<ul class="nav">
    <li class="nav-item active ">
        <?= $this->Html->link(__('<i class="material-icons">dashboard</i> <p> Dashboard </p>'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, '_full' => true, 'class' => 'nav-link']) ?>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="../examples/widgets.html">
            <i class="material-icons">widgets</i>
            <p> Widgets </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="../examples/charts.html">
            <i class="material-icons">timeline</i>
            <p> Charts </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="../examples/calendar.html">
            <i class="material-icons">date_range</i>
            <p> Calendar </p>
        </a>
    </li>
</ul>
