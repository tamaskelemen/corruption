<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\components\Hero;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    /** @var \frontend\models\User $user */
    $user = Yii::$app->user->identity;

    NavBar::begin([
        'brandLabel' => 'Orbán egy geci',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Főoldal', 'url' => ['/site/index']],
//        ['label' => 'Rólunk', 'url' => ['/site/about']],
//        ['label' => 'Kapcsolat', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Regisztráció', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Belépés', 'url' => ['/site/login']];
    } else {
        if (empty($user->hero_id)) {
            $menuItems[] = ['label' => 'Hősválasztó', 'url' => ['/user/choose']];
        } else {
            $menuItems[] = ['label' => 'Kormány', 'url' => ['/institution/index']];
            $menuItems[] = ['label' => 'Közbeszerzések', 'url' => ['/procurement/index']];
            $menuItems[] = ['label' => 'Jelentkezők', 'url' => ['/competition/index']];
            $menuItems[] = ['label' => 'Cégek', 'url' => ['/company/index']];
            $menuItems[] = ['label' => 'Hősöm ', 'url' => ["/hero/view", 'id' => $user->hero_id]];
            $menuItems[] = ['label' => '<span class="glyphicon glyphicon-envelope"></span>', 'url' => '/report'];
        }
        $menuItems[] = [
            'label' => '<div class="glyphicon glyphicon-cog"></div>',
            'items' => [
                ['label' => 'Felhasználói fiók', 'url' => '/user/profile'],
                '<li class="divider"></li>',
                 '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Kilépés (' . $user->email . ')',
                        ['class' => 'btn']
                    )
                    . Html::endForm()
                    . '</li>',
            ],
        ];


    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<div class="modal fade" id="dialog-modal" tabindex="-1" role="dialog" aria-labelledby="dialog-modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="dialog-modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="dialog-modal-label"></h4>
            </div>

            <div class="modal-body"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129990489-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-129990489-1');
</script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
