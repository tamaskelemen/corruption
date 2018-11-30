<?php

namespace frontend\controllers;

use Yii;
use common\components\web\Controller;
use frontend\models\heroes\Hero;
use frontend\models\search\HeroSearch;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HeroController implements the CRUD actions for Hero model.
 */
class HeroController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Hero models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HeroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHeroSelection()
    {
        if (Yii::$app->request->isPost) {
            $user = Yii::$app->user->identity;

            $hero = new Hero();
            $hero->type = $_POST['hero'];

            $heroEntity = $hero->getEntity();
            $heroEntity->type = $hero->type;
            //$transaction = Yii::$app->db->transaction;

            //$transaction->begin();
            try {
                $heroEntity->user_id = $user->id;
                if (!$heroEntity->save()) {
                    throw new Exception("Failed to save hero: " . VarDumper::dumpAsString($heroEntity));
                }

                $user->hero_id = $heroEntity->id;

                if (!$user->save()) {
                    throw new Exception("Failed to save user: " . VarDumper::dumpAsString($user));
                }

                //$transaction->commit();
                Yii::$app->session->setFlash('success', 'Sikeres művelet!');

            } catch (Exception $e) {
                //$transaction->rollBack();
                Yii::error($e);
                Yii::$app->session->setFlash('error', 'Belső hiba történt. Kérjük próbálja újra később!');
            }

            return $this->redirect(['view', 'id' => $heroEntity->id]);
        }
        return $this->render('hero-selection');
    }

    /**
     * Displays a single Hero model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Hero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hero();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Hero model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Hero model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hero::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
