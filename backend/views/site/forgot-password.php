<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<section class="body-content body-content-top" style="display: inline-block;">
    <div class="page-content">

        <div class="">
            <div class="site-login">
                <div class="">

                    <div class="col-sm-12" style="margin-top: 25px; display: inline-block;">
                        <div class="forgot-header">
                            <h4>Forgot Your Password ?</h4>
                            <!--<hr/>-->
                            <h5>Let us help you</h5>
                            <p>Type your username / email ID in the field below to receive your validation code by email:</p>
                        </div>
                        <div class="">
                            <?php $form = ActiveForm::begin(['id' => 'forgot-email']); ?>
                            <?php if (Yii::$app->session->hasFlash('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= Yii::$app->session->getFlash('error') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (Yii::$app->session->hasFlash('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= Yii::$app->session->getFlash('success') ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="">
                                <?= $form->field($model, 'user_name')->textInput(['autofocus' => true, 'placeholder' => "Username"])->label(false); ?>
                            </div>

                            <div class="">
                                <div class="form-group">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                            </div>
                            
                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</section>