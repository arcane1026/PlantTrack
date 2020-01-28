<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');"><?= $message ?></div>-->

<div class="alert alert-default">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
    </button>
    <span><?= $message ?></span>
</div>
