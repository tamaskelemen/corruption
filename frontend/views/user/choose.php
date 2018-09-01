<?php

use frontend\components\Hero;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-4">
            <div class="card">
                <img src="/img/mlorinc.jpg" alt="mlaci" class="img-responsive">
                <div class="card-body text-center hoverable pb-2">
                    <h3 class="card-title">Mészáros Lőrinc</h3>
                    <p class="card-text">
                        Tehetséggeddel könnyen meggyőzöl minden cégvezetőt, hogy kivásárolhasd őket. Ennyi céggel csak összejön egy-két közbeeszerzés!
                    </p>
                    <?= Html::a('Ezt választom',
                        ['/user/choose'],
                        ['data' => ['method' => 'post',
                            'params' => ['hero' => Hero::MESZAROS_LORINC],
                        ],
                            'class' => 'btn btn-primary mb-3']) ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-lg-4">
            <div class="card hoverable">
                <img src="/img/andy_vajna.jpg" alt="andy" class="img-responsive">
                <div class="card-body text-center">
                    <h3 class="card-title">Andy Vajna</h3>
                    <p class="card-text">
                        Aki a kormányt segíti, annak a haza hálás. Ha nem írsz rosszat sehol az országban a kormányról, ki tudja, talán egy kis megbízás lehet a hála.
                    </p>

                    <?= Html::a('Ezt választom',
                        ['/user/choose'],
                        ['data' => ['method' => 'post',
                            'params' => ['hero' => Hero::ANDY_VAJNA],
                        ],
                            'class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-lg-4">
            <div class="card">
                <img src="/img/matolcsy.jpg" alt="matolcsy" class="img-responsive">
                <div class="card-body text-center">
                    <h3 class="card-title">Matolcsy györgy</h3>
                    <p class="card-text">
                        Amilyen jól osztod be a pénzed, úgy a legkissebb közbeszerzésektől is meggazdagodhatsz!
                    </p>
                    <?= Html::a('Ezt választom',
                        ['/user/choose'],
                        ['data' => ['method' => 'post',
                            'params' => ['hero' => Hero::MATOLCSY],
                            ],
                        'class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php

