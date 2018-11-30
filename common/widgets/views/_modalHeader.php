<?php
use yii\helpers\Html;

/** @var bool $isAjax */

$isAjax = $isAjax ?? false;
?>

<?php if ($isAjax) { ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?= t('app', 'Close') ?>">
        <span aria-hidden="true">&times;</span>
    </button>

    <h4 class="modal-title" id="dialog-modal-label"><?= Html::encode($this->title) ?></h4>
</div>

<div class="modal-body"><?php // Don't touch this! ?>
    <?php } else { ?>
        <h1><?= Html::encode($this->title) ?></h1>
    <?php } ?>
