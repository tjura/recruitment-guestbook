<?php

/**
 * @var View $this
 * @var Post $model
 */

use app\models\Post;
use yii\helpers\Html;
use yii\web\View;

?>


<div class="row">
    <div class="col-12">
        <strong><?= Html::encode($model->username) ?></strong>
        <div class="blockquote"><?= Html::encode($model->content) ?></div>
    </div>
</div>
