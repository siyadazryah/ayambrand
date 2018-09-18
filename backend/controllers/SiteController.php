<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\AdminUsers;
use common\models\AdminPosts;
use common\models\ForgotPasswordTokens;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'index', 'home', 'forgot', 'new-password', 'exception'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(array('site/home'));
        }

        $this->layout = 'login';
        $model = new AdminUsers();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login() && $this->setSession()) {

            return $this->redirect(['home']);
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function setSession() {
        $post = AdminPosts::findOne(Yii::$app->user->identity->post_id);
        if (!empty($post)) {
            Yii::$app->session['post'] = $post->attributes;
            return true;
        } else {
            return FALSE;
        }
    }

    public function actionHome() {
        if (isset(Yii::$app->user->identity->id)) {
            if (Yii::$app->user->isGuest) {
                return $this->redirect(['index']);
            }
            return $this->render('index', [
            ]);
        } else {
            throw new \yii\web\HttpException(2000, 'Session Expired.');
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['home']);
        }

        $model = new AdminUsers();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login() && $this->setSession()) {

            return $this->redirect(['home']);
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionForgot() {
        $this->layout = 'login';
        $model = new AdminUsers();
        if ($model->load(Yii::$app->request->post())) {
            $check_exists = AdminUsers::find()->where("user_name = '" . $model->user_name . "' OR email = '" . $model->user_name . "'")->one();

            if (!empty($check_exists)) {
                $token_value = $this->tokenGenerator();
                $token = $check_exists->id . '_' . $token_value;
                $val = base64_encode($token);
                $token_model = new ForgotPasswordTokens();
                $token_model->user_id = $check_exists->id;
                $token_model->token = $token_value;
                $token_model->save();
//                $this->sendMail($val, $check_exists);
                Yii::$app->getSession()->setFlash('success', 'A mail has been sent');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Invalid username');
            }
            return $this->render('forgot-password', [
                        'model' => $model,
            ]);
        } else {
            return $this->render('forgot-password', [
                        'model' => $model,
            ]);
        }
    }

    public function tokenGenerator() {

        $length = rand(1, 1000);
        $chars = array_merge(range(0, 9));
        shuffle($chars);
        $token = implode(array_slice($chars, 0, $length));
        return $token;
    }

    public function sendMail($val, $model) {

        $to = $model->email;
        $subject = 'Change password';
        $message = $this->renderPartial('forgot_mail', ['model' => $model, 'val' => $val]);
// To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
                "From: 'info@ayambrand.com";
        mail($to, $subject, $message, $headers);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
