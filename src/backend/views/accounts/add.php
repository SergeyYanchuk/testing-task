<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentsTransactions */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Пополнить счет';
$this->params['breadcrumbs'] = [['label' => 'Пополнение счета', 'url' => ['index']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payments-transactions-add">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="payments-transactions-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sum')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => '',
                'suffix' => ' р.',
                'allowNegative' => false
            ]]) ?>

        <div class="form-group">
            <?= Html::submitButton('Выполнить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
