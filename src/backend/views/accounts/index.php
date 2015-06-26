<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\Alert;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AccountsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Счета';
$this->params['breadcrumbs'] = [$this->title];
?>
<?= Alert::widget(); ?>
<div class="accounts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '<p class="summaryInfo">Показано <b>{begin, number} - {end, number}</b> из <b>{totalCount, number}</b> результатов.</p>',
        'layout' => "{summary}\n{items}\n{pager}",
        'emptyText' => 'Нет записей',
        'columns' => [
            'number',
            'balance:decimal',
            [
                'class' => 'backend\widgets\ExtendedActionColumn',
                'controller' => 'accounts',
                'template' => '{view} {add}',
            ],
        ],
    ]); ?>

</div>
