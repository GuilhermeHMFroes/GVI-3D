<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'GVI-3D - Materiais';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div style="display: none">
    <h2>Materiais</h2>

    <div>

        <p>A GVI-3D trabalha com uma gama de materiais, dê uma conferida nos filamentos que utilizamos:</p>

        <div class="row">

            <?php foreach ($materiais as $material): ?>

                <div class="material">

                    <h3><?= $material->tipo ?></h3>
                    <img src="<?= $material->imagem ?>" alt="<?= $material->tipo ?>" style="display: block; margin: 0 auto; height: 500px;">
                    <br>
                    <p><?= $material->descricao ?></p>
                    <br>

                </div>

                <div class="separador"></div><br>
                
            <?php endforeach; ?>

        </div>
        
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        $("div:hidden").fadeIn("slow");
    });
    
</script>
