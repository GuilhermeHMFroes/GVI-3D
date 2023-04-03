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

    <h2>Painel de controle</h2><br>

    <p style="text-align: center;">Seja bem-vindo(a) <?= Yii::$app->user->identity->nome ?>.</p>

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

            <h4>Usuários</h4>

            <p style="text-align: center;">Para poder criar, alterar ou excluir algum usuário por favor clique no botão abaixo para ser redirecionado para a página de controle dos produtos:</p>

            <div>
                <?= Html::a('Materiais', ['/usuario/index'], ['class' => 'btn btn-primary']) ?>
            </div>

        </div>

        <br><div class="separador"></div><br>

        <div>

            <h2>Relatórios</h2><br>

            <div>
                <h4>Materiais mais utilizados</h4>

                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-left">Tipo</th>
                            <th class="text-left">Quantidade de usos</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($relatorioMaisUsados as $resultado): ?>
                                <tr>
                                <td><?= $resultado['tipo'] ?></td>
                                <td><?= $resultado['quantidade_usos'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div><br>

            <div>
                <h4>Materiais mais caros</h4>

                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-left">Tipo</th>
                            <th class="text-left">Preço</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($relatorioPrecoMaterial as $resultado): ?>
                                <tr>
                                <td><?= $resultado['tipo'] ?></td>
                                <td><?= 'R$ ' . number_format($resultado['valor'], 2, ',', '.') ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div><br>

            <div>
                <h4>Lista de produtos</h4>

                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($relatorioPrecosProduto as $resultado): ?>
                            <tr>
                                <td><?= $resultado['nome'] ?></td>
                                <td><?= $resultado['valor'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        <br><div class="separador"></div><br>

        <div>

            <h2>Encerrar seção</h2>

            <p style="text-align: center;">Para encerrar a seção clique no botão abaixo:</p>

            <div>
                <?= Html::a('Encerrar Seção', ['/site/logout'], ['class' => 'btn btn-danger'] ) ?>
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