<?php

/**
 * @var yii\web\View $this
 * @var ActiveDataProvider $dataProvider
 * @var Post $model
 */

use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Guestbook';

?>

<?php
Pjax::begin(['id' => 'grid']) ?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Guestbook!</h1>
        <p class="lead"></p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-12">
                <?= $this->render('partial/_form', ['model' => $model]) ?>
                <hr/>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => 'partial/_post',
                    'emptyText' => Yii::t('app', 'No results found, dont be shy, create first entry in the guest book')
                ]); ?>
            </div>
        </div>
    </div>
</div>

<?php
Pjax::end() ?>
