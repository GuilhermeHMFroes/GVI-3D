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
        //Relatório 1: Listar os produtos mais usados
        // Executa a consulta para contar os usos de cada material
        $maisUsados = (new \yii\db\Query())
            ->select(['material.*', 'COUNT(produto.id) AS quantidade_usos'])
            ->from('material')
            ->leftJoin('produto', 'material.id = produto.id_material')
            ->groupBy('material.id')
            ->orderBy('quantidade_usos DESC');

        // Executa a consulta e armazena os resultados em um array
        $relatorioMaisUsados = $maisUsados->all();

        //Relatório 2: Listar os produtos pelo preço
        // Executa a consulta para listar os materiais e seus preços
        $materiaisPrecos = (new \yii\db\Query())
            ->select(['tipo', 'valor'])
            ->from('material')
            ->orderBy('valor DESC');

        // Executa a consulta e armazena os resultados em um array
        $relatorioPrecoMaterial = $materiaisPrecos->all();

        //Relatório 3: listar os produtos por preço
        // Executa a consulta para listar os materiais e seus preços
        $produtosPrecos = (new \yii\db\Query())
            ->select(['nome', 'valor'])
            ->from('produto')
            ->orderBy('valor ASC');

        // Executa a consulta e armazena os resultados em um array
        $relatorioPrecosProduto = $produtosPrecos->all();

        // Renderiza a view 'relatorio_mais_usados' passando os resultados
        return $this->render('usuario', [
            'relatorioMaisUsados' => $relatorioMaisUsados,
            'relatorioPrecoMaterial' => $relatorioPrecoMaterial,
            'relatorioPrecosProduto' => $relatorioPrecosProduto
        ]);

    }

}
