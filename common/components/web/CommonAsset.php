<?php
namespace common\components\web;

use yii\web\AssetBundle;

class CommonAsset extends AssetBundle
{
    public $sourcePath = '@common/assets';

    public $css = [
    ];

    public $js = [
        'js/setAsap-2.0.0.min.js',
        'js/promise-6.0.2.min.js',
        'js/common.js',
    ];

    public $depends = [
    ];
}
