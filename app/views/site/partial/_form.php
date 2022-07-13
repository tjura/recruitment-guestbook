<?php

/**
 * @var View $this
 * @var Post $model
 */

use app\models\Post;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

?>

<?php
$form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>
<?php
echo $form->field($model, 'username')->textInput(['maxlength' => 256]) ?>
<?php
echo $form->field($model, 'content')->textarea(['maxlength' => 512]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-success']) ?>
    </div>
<?php
ActiveForm::end();
