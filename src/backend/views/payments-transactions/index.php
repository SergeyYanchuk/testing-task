<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PaymentsTransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payments Transactions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'from',
            'to',
            'sum',
            'date_entered',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
