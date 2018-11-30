<?php
namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use common\components\web\Controller;

class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['choose', 'profile'],
                'rules' => [
                    [
                        'actions' => ['choose', 'profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionChoose()
    {
        /** @var User $user */
        $user = Yii::$app->user->getIdentity();
        if (Yii::$app->request->isPost) {
            $user->hero = $_POST['hero'];

            if (!$user->save()) {
                Yii::error('Could not save user: ' . VarDumper::dumpAsString($user));
            }

            return $this->render('profile', ['user' => $user]);
        }
        return $this->render('choose', ['user' => $user]);
    }

    public function actionProfile()
    {
        $user = Yii::$app->user->getIdentity();

        return $this->render('profile', ['user' => $user]);
    }
}