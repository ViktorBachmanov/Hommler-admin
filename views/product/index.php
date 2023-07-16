<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerJsFile('@web/js/columns.js');

if(isset($_COOKIE['check-sku'])) {
  $skuChecked = $_COOKIE['check-sku'] === 'true'
    ? true 
    : false;
}
else {
  $skuChecked = true;
}

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="form-check" id="checkColumns">
      <input class="form-check-input" type="checkbox" value="" id="checkSku" <?= $skuChecked ? 'checked' : '' ?> >
      <label class="form-check-label" for="checkSku">
        SKU
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="checkName" checked>
      <label class="form-check-label" for="checkName">
        Название
      </label>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
              'attribute' => 'sku',
              'visible' => $skuChecked,
            ],
            'name',
            [
              'attribute' => 'quantity',
              'visible' => true,
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
