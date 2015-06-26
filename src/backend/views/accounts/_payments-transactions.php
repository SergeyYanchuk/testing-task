<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>

<h3 class="title">История пополнений</h3>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'sum',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>