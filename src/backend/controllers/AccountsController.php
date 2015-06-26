<?php

namespace backend\controllers;

use common\components\SystemAccountEmptyException;
use common\models\PaymentsTransactions;
use common\models\PaymentsTransactionsSearch;
use Yii;
use common\models\Accounts;
use common\models\AccountsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AccountsController implements the CRUD actions for Accounts model.
 */
class AccountsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Accounts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccountsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Accounts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $queryParams = Yii::$app->request->queryParams;

        $paymentTransactionsSearchModel = new PaymentsTransactionsSearch();
        $queryParams['PaymentsTransactionsSearch']['to'] = $model->number;
        $paymentTransactionsDataProvider = $paymentTransactionsSearchModel->search($queryParams);
        $paymentTransactionsDataProvider->setPagination(['pageSize' => 10]);

        return $this->render('view', [
            'model' => $model,
            'paymentTransactionsSearchModel' => $paymentTransactionsSearchModel,
            'paymentTransactionsDataProvider' => $paymentTransactionsDataProvider,
        ]);
    }

    /**
     * Creates a new PaymentsTransactions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd($to)
    {
        $model = new PaymentsTransactions();
        $model->to = $to;

        try {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Счет успешно пополнен');
                return $this->redirect(['accounts/index']);
            } else {
                return $this->render('add', [
                    'model' => $model,
                ]);
            }
        } catch (SystemAccountEmptyException $e) {
            Yii::$app->session->setFlash('error', 'Недостаточно средств на системном счете');
            return $this->redirect(['accounts/index']);
        }
    }


    /**
     * Finds the Accounts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Accounts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Accounts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
