<?php
namespace common\components;

use common\grid\GridView;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Helper
{
    /**
     * @param array $config
     * @return array
     */
    public static function getFormConfig(array $config = []): array
    {
        $defaults = [];

        $defaults['fieldConfig'] = [
            'options' => [
                'class' => 'form-group',
            ],
            'template' => "{label}\n<div class=\"col-sm-8\">\n{input}\n{hint}\n{error}\n</div>",
            'labelOptions' => [
                'class' => 'control-label col-sm-4',
            ],
        ];
        $defaults['options']['class'] = 'form-horizontal';

        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            $defaults['options']['data-ajax'] = '1';

            self::setOptionsDataAttribute($defaults, 'redirect');
            self::setOptionsDataAttribute($defaults, 'replace');
            self::setOptionsDataAttribute($defaults, 'update');
        }

        return ArrayHelper::merge($defaults, $config);
    }

    /**
     * @param \common\grid\GridView $grid
     * @return string
     */
    public static function getGridColumnSelector(GridView $grid): string
    {
        $options = [];
        foreach ($grid->selectedColumns as $col) {
            $options[$col]['selected'] = 'selected';
        }

        $items = $grid->getSelectableColumns();
        $list = Html::dropDownList('cols', [], $items, [
            'class' => 'form-control input-sm',
            'multiple' => 'multiple',
            'data-filter-row-id' => "#{$grid->filterRowOptions['id']}",
            'data-select' => 'grid-col-select',
            'data-update' => "#{$grid->id}",
            'options' => $options,
            'size' => count($items),
        ]);

        $html = Html::button('<span class="glyphicon glyphicon-menu-hamburger"></span>', [
            'class' => 'btn btn-default',
            'data-toggle' => 'popover',
            'data-placement' => 'left',
            'data-content' => $list,
            'data-html' => 1,
            'title' => Yii::t('app', 'Columns'),
        ]);

        return $html;
    }

    /**
     * @param array $config
     * @return array
     */
    public static function getGridConfig(array $config = []): array
    {
        $defaults = [];

        return ArrayHelper::merge($defaults, $config);
    }

    /**
     * @param array $config
     * @return array
     */
    public static function getPjaxConfig(array $config = []): array
    {
        $defaults = [];

        $defaults['enablePushState'] = 0;

        return ArrayHelper::merge($defaults, $config);
    }

    /**
     * @param string|null $string
     * @return string
     */
    public static function strToDateTime($string): string
    {
        if (strlen($string) === 0) {
            return '';
        }

        return date('Y-m-d H:i:s', strtotime($string));
    }

    /**
     * @param array $config
     * @param string $key
     */
    protected static function setOptionsDataAttribute(array &$config, string $key)
    {
        if (!empty($_GET[$key])) {
            $config['options']["data-{$key}"] = $_GET[$key];
        }
    }
}
