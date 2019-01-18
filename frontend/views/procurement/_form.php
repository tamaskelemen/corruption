<?php

use frontend\models\Ability;
use frontend\models\Institution;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Procurement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procurement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Közbeszerzés címe') ?>

    <?= $form->field($model, 'ends_at')->textInput()->label('Határidő') ?>

    <?= $form->field($model, 'institution_id')->dropDownList(Institution::listActives())->label('Meghirdető intézmény') ?>

    <?= $form->field($model, 'abilities')->checkboxList(Ability::listActives())->label('Pályázati feltételek') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
