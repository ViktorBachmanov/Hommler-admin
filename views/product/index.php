<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use app\util\ProductColumn;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerJsFile('@web/js/columns.js');

ProductColumn::seedProductColumns([
  ['sku', 'SKU'],
  ['name', 'Название'],
  ['quantity', 'Кол-во'],
  ['type', 'Тип'],
]);

$columns = ProductColumn::$columns;

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
      echo "<div id='check-columns'>";
      foreach($columns as $column) {
        $checked = $column->visible ? 'checked' : '';

        echo "<div class='form-check'>";
        echo  "<input class='form-check-input' type='checkbox' value='' id='check-{$column->name}' $checked >";
        echo  "<label class='form-check-label' for='check-{$column->name}'>";
        echo $column->label;
        echo "</label>";
        echo "</div>";
      }
      echo "</div>";
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
              'attribute' => $columns[0]->name,
              'visible' => $columns[0]->visible,
              'label' => $columns[0]->label,
            ],
            [
              'attribute' => $columns[1]->name,
              'visible' => $columns[1]->visible,
              'label' => $columns[1]->label,
            ],
            [
              'attribute' => $columns[2]->name,
              'visible' => $columns[2]->visible,
              'label' => $columns[2]->label,
            ],
            [
              'attribute' => 'type.name',
              'label' => 'Тип',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
