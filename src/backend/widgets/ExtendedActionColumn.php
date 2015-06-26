<?php

namespace backend\widgets;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

/**
 * Class ExtendedActionColumn
 * @package crm\widgets\grid
 */
class ExtendedActionColumn extends ActionColumn
{
    /**
     * @throws \yii\base\InvalidConfigException
     */
    protected function checkParams()
    {
        if (is_null($this->controller)) {
            throw new InvalidConfigException("The 'controller' option is required.");
        }
    }

    protected function initDefaultButtons()
    {
        parent::initDefaultButtons();

        if (!isset($this->buttons['add'])) {
                $this->buttons['add'] = function ($url, $model, $key) {
                    $url = Yii::$app->urlManager->createUrl([$this->controller.'/add','to'=>$model['number']]);
                    $options = array_merge([
                        'title' => 'Пополнить счет',
                        'aria-label' => Yii::t('yii', 'Add'),
                        'data-pjax' => '0',
                    ], $this->buttonOptions);
                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, $options);
                };

        }
    }



}