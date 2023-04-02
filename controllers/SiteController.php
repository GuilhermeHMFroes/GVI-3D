<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Produto;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
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
     * @return string
     */

     public function getMaterial()
     {
        return $this->hasOne(Material::class, ['id' => 'id_material']);
     }

    public function actionIndex()
    {
        $produtos = Produto::find()
            ->joinWith('material')
            ->select(['produto.*', 'material.tipo'])
            ->all();

        return $this->render('index', [
            'produtos' => $produtos,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */

    public function actionOrcamento()
    {
    
        return $this->render('orcamento');
    
    }

    public function actionMateriais()
    {
    
        $materiais = \app\models\Material::find()->all();

        return $this->render('materiais', [
            'materiais' => $materiais,
        ]);
    
    }

    /*public function beforeAction($action)
    {
        if ($action->id === 'produto' && !Produto::findOne(Yii::$app->request->getQueryParam('id'))) {
            throw new NotFoundHttpException('O produto solicitado não foi encontrado.');
        }

        return parent::beforeAction($action);
    }*/

    public function actionProduto($id)
    {
        
        // Encontra o modelo do produto pelo ID
        $model = Produto::findOne($id);

        if (!$model) {
            return $this->render('index');
        }
    
        return $this->render('produto', [
            'model' => $model,
        ]);

    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionUsuario()
    {
        return $this->render('usuario');
    }

}
