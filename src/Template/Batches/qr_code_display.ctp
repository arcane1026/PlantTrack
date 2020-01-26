<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch $batch
 */
?>
<div class="qr-code-display">
    <?= (empty($fields['name'])) ? '' : '<h1>'. h($batch->name) .'</h1>' ?>
    <?= (empty($fields['description'])) ? '' : '<h2>'. h($batch->description) .'</h2>' ?>
    <table>
        <?= (empty($fields['growthProfile'])) ? '' : '<tr><th>Growth Profile</th><td>' . h($batch->growth_profile->name) . '</td></tr>' ?>
        <?= (empty($fields['plant'])) ? '' : '<tr><th>Plant Type</th><td>' . h($batch->plant->name) . '</td></tr>' ?>
        <?= (empty($fields['quantity'])) ? '' : '<tr><th>Plant Quantity</th><td>' . h($batch->quantity) . '</td></tr>' ?>
    </table>
    <div class="qr-code">
        <img src="https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chs=300x300&chl=<?= $qrUrl ?>" />
    </div>
    <div class="copyright">&copy; <?= date('Y') ?> PlantTrack</div>
    <div class="logo">
        <img src="http://planttrackapp.com/img/planttrack_logo.png" />
    </div>
</div>

