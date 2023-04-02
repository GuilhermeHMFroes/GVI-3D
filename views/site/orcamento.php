<?php

/** @var yii\web\View $this */

//use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
//use yii\captcha\Captcha;

$this->title = 'GVI-3D - Orçamento';

?>

<div style="display: none">
    <h2>Orçamentos</h2>

    <div>
    
        <p>Para podermos atender você de maneira mais eficiente o formulário para solicitar um orçamento se encontra no 
            link abaixo onde vc será redirecionaod me uma nova guia para o google forms.</p>

        <p>O orçamento poderá ser feito para:</p>
        <ul>
            <li>
                Caso não haja a peça que você queria queira na nossa loja, você deve enviar o link onde tem esse projeto, pode ser 
                do youtube ou de sites como o thingverse que disponilizam os modelos 3D. Obs.: Os modelos 3D pagos terão acréscimo no valor da compra;
            </li>
            <li>
                Se você desejar alterar algumas características de algum objeto que vendemos na nossa loja, como o material por exemplo;
            </li>
            <li>
                Dentre outros;
            </li>
        </ul>

        <p>Link para o formulário: <a href="https://forms.gle/khpPkEKbBAmcdYL7A" target="_blank">Clique aqui!</a></p>

    </div>
    
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        $("div:hidden").fadeIn("slow");
    });
    
</script>
