<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/logo/logo.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/web/logo/logo.ico" type="image/x-icon">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style>

        .separador {
            border-top: 1px solid #ced4da;
        }

        p{
            text-align: justify;
        }

        h2, h4{
            text-align: center;
        }

        .table-wrapper {
            text-align: center;
        }

        .table-wrapper table {
            margin: 0 auto;
            text-align: center;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #ddd;
        }

        .userIcon{
            position: absolute;
            right: 50px;
            height: 30px;
        }

        .listaConjunto {
            list-style: none;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .listaElemento {
            margin: 0 10px;
        }

    </style>

</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([

        'brandLabel' => '<img style="height: 30px;" src="' . Yii::$app->request->baseUrl . '/logo/logo.ico" class="d-inline-block align-top" alt="Logo"> GVI 3D',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'], // adicionando a classe ml-auto
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Orçamento', 'url' => ['/site/orcamento']],
            ['label' => 'Sobre nós', 'url' => ['/site/about']],
            ['label' => 'Materiais', 'url' => ['/site/materiais']],

            //['label' => 'Login', 'url' => ['/site/login']]
            //. Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'nav-link btn btn-link logout'])

            Yii::$app->user->isGuest
            ? Html::a(
                '<img class="userIcon" title="Login" src="' . Yii::$app->request->baseUrl . '/icons/user.png" alt="Login">', 
                ['/site/login'])
            : '<li class="nav-item">'
                #. Html::beginForm(['/site/logout'])
                . Html::beginForm(['/site/usuario'])
                . Html::submitButton(
                    '<img class="userIcon" title="Tela Do Usuário" src="' . Yii::$app->request->baseUrl . '/icons/user.png" alt="Login">',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
    ]
]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; GVI 3D - <?= date('Y') ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
