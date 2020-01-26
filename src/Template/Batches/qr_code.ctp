<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batch $batch
 */
?>
<div class="batches form large-9 medium-8 columns content">
    <?= $this->Form->create(false, ['target' => '_blank']) ?>
    <fieldset>
        <legend><?= __('Generate QR Code') ?></legend>
        <h3>Select Fields for QR Code sheet.</h3>
        <div class="input">
            <input type="checkbox" id="name" name="name" checked />
            <label for="name">Name</label>
        </div>
        <div class="input">
            <input type="checkbox" id="description" name="description" checked />
            <label for="description">Description</label>
        </div>
        <div class="input">
            <input type="checkbox" id="growthProfile" name="growthProfile" checked />
            <label for="growthProfile">Growth Profile</label>
        </div>
        <div class="input">
            <input type="checkbox" id="plant" name="plant" checked />
            <label for="plant">Plant Type</label>
        </div>
        <div class="input">
            <input type="checkbox" id="quantity" name="quantity" checked />
            <label for="quantity">Plant Quantity</label>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Generate Code')) ?>
    <?= $this->Form->end() ?>
</div>
