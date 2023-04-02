<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JqueryAsset;

$this->title = 'GVI-3D - Usuário';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="display: none">
    
    <br>

    <h2>Painel de controle</h2>

    <br><div class="separador"></div><br>

    <div style="text-align: center;">

        <div>

            <h4>Produtos</h4>

            <p style="text-align: center;">Para poder criar, alterar ou excluir algum produto por favor clique no botão abaixo para ser redirecionado para a página de controle dos produtos:</p>

            <div>
                <?= Html::a('Produtos', ['/produto/index'], ['class' => 'btn btn-primary']) ?>
            </div>

        </div>

        <br><div class="separador"></div><br>

        <div>

            <h4>Materiais</h4>

            <p style="text-align: center;">Para poder criar, alterar ou excluir algum material por favor clique no botão abaixo para ser redirecionado para a página de controle dos produtos:</p>

            <div>
                <?= Html::a('Materiais', ['/material/index'], ['class' => 'btn btn-primary']) ?>
            </div>

        </div>

        <br><div class="separador"></div><br>

        <div>

            <h4>Encerrar seção</h4>

            <p style="text-align: center;">Para encerrar a seção clique no botão abaixo:</p>

            <div>
                <?= Html::a('Materiais', ['/material/index'], ['class' => 'btn btn-danger']) ?>
            </div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        $("div:hidden").fadeIn("slow");
    });
    
</script>