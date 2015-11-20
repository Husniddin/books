<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'preview',
            'date',            
            'date_create',
            // 'date_update',
            [
                'attribute' => 'author_id',                
                'value' => function ($model) {
                    return $model->author->firstname.' '.$model->author->lastname;
                },
            ],

            ['header' => 'Кнопки действий', 'class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
