<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Authors;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
        //echo $form->field($model, 'date_create')->textInput();
    ?>

    <?php 
        //echo $form->field($model, 'date_update')->textInput() 
    ?>

    <?= $form->field($model, 'preview')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
            'language' => Yii::$app->language,        
            'dateFormat' => 'yyyy-MM-dd',
            'containerOptions'=>[
                'class'=>'form-control'
            ]
        ]) 
    ?>

    <?php

        $authors = Authors::find()->all();
         
        // $listData = ArrayHelper::map($authors,'id','firstname');
        $listData = ArrayHelper::map($authors,'id',function ($authors, $defaultValue){
            return $authors->firstname.' '.$authors->lastname;
        });
         
        echo $form->field($model, 'author_id')
            ->dropDownList($listData,['prompt'=>'Автор']);
     ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
