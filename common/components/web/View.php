<?php
namespace common\components\web;

use Yii;

class View extends \yii\web\View
{
    /**
     * @inheritdoc
     */
    public function render($view, $params = [], $context = null)
    {
        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            $replace = $_GET['replace'] ?? false;
            if (!$replace && !isset($params['isAjax'])) {
                $params['isAjax'] = true;
            }
        }

        return parent::render($view, $params, $context);
    }
}
