<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\widgets\ActiveForm;
use \yii\web\Response;
/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup',],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        //  $model = new Products();
        // $comUnit = \frontend\models\Products::findBySql('where ProductId = 1');
        //findBy(array("ProductID"=>'1'));
        //print_r($comUnit);
        // var_dump($comUnit);
        if (!\Yii::$app->user->isGuest) {
            //return $this->goHome();
            $this->redirect(Yii::$app->urlManager->createUrl(['/info/index']));
        }

        $model = new LoginForm();
        $model2 = new SignupForm();
        return $this->render('index', [
                    'model' => $model,
                    'model2' => $model2,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixedfindByAttributes
     */
    public function actionSample() {
        $data = \frontend\models\Products::findOne(array('ProductID' => 1));
        //print_r($data);
        // $arr = array();
        //  $arr['ProductID'] = $data->ProductID;
        // $arr['ProductSKU'] = $data->ProductSKU;
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'ProductID' => $data->ProductID,
            'ProductSKU' => $data->ProductSKU,
        ];
    }

    public function actionLogin() {
        
        
        if (!\Yii::$app->user->isGuest) {
            //return $this->goHome();
            $this->redirect(Yii::$app->urlManager->createUrl(['/info/index']));
        }

        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load($_POST/*Yii::$app->request->post()*/)&& $model->login()) {
            Yii::$app->response->format = Response::FORMAT_JSON;

                $json = [
                    ['loginform-password'=>'success','redirect' => Yii::$app->urlManager->createUrl(['/info/index'])],
                ];
                
                return $json;/*\yii\helpers\Json::encode($json);*/
            
        }else{
            //\Yii::$app->response->format = Response::FORMAT_JSON;
                return \yii\helpers\Json::encode(ActiveForm::validate($model));
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->redirect(Yii::$app->urlManager->createUrl(['/info/index']));
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLajax() {
        $model = new LoginForm();


if(Yii::$app->request->isAjax){
            \Yii::$app->response->format = Response::FORMAT_JSON;

                $json = [
                    ['loginform-password'=>'success','redirect' => Yii::$app->urlManager->createUrl(['/info/index'])],
                ];
                return $json;
        }
//echo  Yii::$app->request->post('isAjax');  


        if (Yii::$app->request->post('isAjax') === 1 && $model->login()) {
            \Yii::$app->response->format = Response::FORMAT_JSON;

            $json = [
                ['redirect' => Yii::$app->urlManager->createUrl(['/info/index'])],
            ];
            return $json;
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    //return $this->goHome();
                    $this->redirect(Yii::$app->request->baseUrl . '/info/index');
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    function actionShowmodal() {
        $js = '$("#modal").modal("show")';
        $this->getView()->registerJs($js);
        $model = new LoginForm();
        $model2 = new SignupForm();
        return $this->render('index', [
                    'model' => $model,
                    'model2' => $model2,
        ]);
    }

}
