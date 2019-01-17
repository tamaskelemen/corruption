<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ProcurementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Közbeszerzések';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procurement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Új közbeszerzés kíírása', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'created_at',
            'ends_at',
            'institution.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
