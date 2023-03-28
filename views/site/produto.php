<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'GVI-3D - Produto';
//$this->params['breadcrumbs'][] = $this->title;

?>

<style>

    ul {
        list-style: none;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    li {
        margin: 0 10px;
    }

</style>

<div style="display: none">
    <div class="produto-view">

        <div class="produto" id="produto">
            <h2><?= $model->nome ?></h2>
            <img src="<?= $model->imagem ?>" alt="<?= $model->nome ?>" style="display: block; margin: 0 auto;">
            <br><br>
            <h4>Descrição</h4>
            <p><?= $model->descricao ?></p>
            <p>Valor: R$ <?= number_format($model->valor, 2, ',', '.') ?></p>
            <p id="material">Material: <?= $model->material->tipo ?></p>
        </div>
        
        <br><div class="separador"></div><br>

        <div class="material" id="material">

            <h2>Sobre o material utilizado</h2>

            <img src="<?= $model->material->imagem ?>" alt="<?= $model->nome ?>" style="display: block; margin: 0 auto; height: 500px;">

            <div>

                <p>Tipo de filamento que foi usado: <?= $model->material->tipo ?></p><br>

                <h4>Descrição</h4>

                <p><?= $model->material->descricao ?></p>

                <br>
                
                <h4>Especificações</h4>

                <p><?= str_replace('.', '.<br>', $model->material->especificacoes) ?></p>

            </div>

        </div>

        <br><div class="separador"></div><br>

        <div id="Compra">

            <h2>Onde Comprar</h2>

            <p>Para sua segunça vendemos apenas nesses sites. Quando você clicar na imagem da plataforma você será redirecionado para uma
                nova guia do produto na plataforma da sua escolha.</p>
            
            <ul>

                <li>
                    <a href="<?= $model->linkShopee ?>" target="_blank">
                        <img style="height: 120px;" src="<?= Yii::getAlias('@web/icons/shopee.svg') ?>" alt="Shopee">
                    </a>
                </li>

                <li>
                    <a href="<?= $model->linkAmazon ?>" target="_blank">
                        <img style="height: 120px;" src="<?= Yii::getAlias('@web/icons/amazon.svg') ?>" alt="Amazon">
                    </a>
                </li>

                <li>
                    <a href="<?= $model->linkMercadoLivre ?>" target="_blank">
                        <img style="height: 120px;" src="<?= Yii::getAlias('@web/icons/mercado_livre.svg') ?>" alt="Mercado Livre"> 
                    </a>
                </li>

            </ul>

        </div>

        <br><div class="separador"></div><br>

        <div>

            <h2>Alterações</h2>
            
            <br>

            <p>Caso você deseje alterar alguma característica da peça como tamanho, material(filamento), ou qualquer outra mudança
                por favor <a>clique aqui</a> que você vai ser redirecionada para o formulário de orçamento.</p>

        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        $("div:hidden").fadeIn("slow");
    });
    
</script>