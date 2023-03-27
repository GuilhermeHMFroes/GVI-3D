<?php

///** @var yii\web\View $this */

//$this->title = 'GVI 3D';

use yii\helpers\Html;

$this->title = 'GVI-3D';
$this->params['breadcrumbs'][] = $this->title;

?>


<?php foreach ($produtos as $produto) : ?>
    <div class="produto">
        <h2  style="text-align: center;"><?= $produto->nome ?></h2>
        <img src="<?= $produto->imagem ?>" alt="<?= $produto->nome ?>" style="display: block; margin: 0 auto;">
        <br>
        <p style="text-align: justify;"><?= $produto->descricao ?></p>
        <p>Valor: R$ <?= number_format($produto->valor, 2, ',', '.') ?></p>
    </div>
<?php endforeach; ?>
