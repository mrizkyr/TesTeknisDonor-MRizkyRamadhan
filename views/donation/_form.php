<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Donation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="donation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'donation_date')->textInput() ?>

    <?= $form->field($model, 'donor_id')->textInput() ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
