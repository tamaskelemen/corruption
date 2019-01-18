<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Procurement */

$this->title = 'Új közbeszerzés kíírása';
$this->params['breadcrumbs'][] = ['label' => 'Közbeszerzések', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procurement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
