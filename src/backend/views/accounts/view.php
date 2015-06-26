<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Accounts */

$this->title = 'Счет №'.$model->number;
$this->params['breadcrumbs'] = [['label' => 'Счета', 'url' => ['index']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accounts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'number',
            'balance:decimal',
        ],
    ]) ?>

    <?= $this->render('_payments-transactions', [
        'dataProvider' => $paymentTransactionsDataProvider,
        'searchModel' => $paymentTransactionsSearchModel
    ]); ?>

</div>

