<?php

///** @var yii\web\View $this */

//$this->title = 'GVI 3D';

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'GVI-3D - Home';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div style="display: none">

    <?php foreach ($produtos as $produto) : ?>

        <div class="produto">

            <h2><?= $produto->nome ?></h2>
            <img src="<?= $produto->imagem ?>" alt="<?= $produto->nome ?>" style="display: block; margin: 0 auto;">
            <br>
            <p><?= $produto->descricao ?></p>
            <p>Valor: R$ <?= number_format($produto->valor, 2, ',', '.') ?></p>
            <p id="material">Material: <?= $produto->material->tipo ?></p>
            <?= Html::a('Ver mais', ['site/produto', 'id' => $produto->id], ['class' => 'btn btn-primary']) ?>

        </div>

        <br><div class="separador"></div><br>

    <?php endforeach; ?>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        $("div:hidden").fadeIn("slow");
    });
    
</script>
