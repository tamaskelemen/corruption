<?php
/** @var array $buttons */
/** @var bool $isAjax */
/** @var bool $showSubmit */
/** @var \common\models\ActiveRecord $model */

$buttons = $buttons ?? [];
$isAjax = $isAjax ?? false;

$showSubmit = isset($showSubmit) ? $showSubmit : true;
?>

<?php if ($isAjax) { ?>
    </div><?php // Don't touch this! ?>
<?php } ?>

<div class="<?= $isAjax ? 'modal-footer' : 'buttons' ?>">
    <?php if ($isAjax) { ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">
            <?= t('app', 'Cancel') ?>
        </button>
    <?php } ?>

    <?php foreach ($buttons as $button) { ?>
        <?= $button ?>
    <?php } ?>

    <?php if ($showSubmit) { ?>
        <button type="submit" class="btn <?= $model->isNewRecord ? 'btn-success' : 'btn-primary' ?>">
            <?= $model->isNewRecord ? t('app', 'Create') : t('app', 'Update') ?>
        </button>
    <?php } ?>
</div>
