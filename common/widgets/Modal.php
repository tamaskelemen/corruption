<?php
namespace common\widgets;

use yii\base\Widget;

class Modal extends Widget
{
    public $headerParams = [];
    public $footerParams = [];
    public $headerView = '_modalHeader';
    public $footerView = '_modalFooter';

    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        $content = ob_get_clean();

        echo $this->render($this->headerView);
        echo $content;
        echo $this->render($this->footerView, $this->footerParams);
    }
}
