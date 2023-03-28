<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JqueryAsset;

$this->title = 'GVI-3D - Sobre nós';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="display: none">
    
    <br>

    <h2>Sobre Nós</h2>

    <div>

        <br>
        
        <img style="display: block; margin: 0 auto;" src="<?= Yii::getAlias('@web/logo/GVI-3D/logo.png') ?>">

        <br>
        
        <p>A GVI-3D é uma loja especializada na venda de objetos impressos em 3D. Com uma ampla variedade de produtos, 
        a loja oferece soluções para as mais diversas necessidades dos clientes.</p>

        <p>Os objetos impressos em 3D oferecem inúmeras vantagens, como a possibilidade de criar peças personalizadas e únicas, 
            com alta precisão e detalhamento. Na GVI-3D, é possível encontrar desde pequenos objetos decorativos até peças maiores 
            e mais complexas, como protótipos e maquetes.</p>

        <p>Além disso, a loja conta com uma equipe de profissionais altamente capacitados, que estão sempre prontos para ajudar e orientar 
            os clientes em suas escolhas. A GVI-3D preza pela qualidade e pela satisfação dos clientes, garantindo a entrega de produtos de alto nível.</p>

        <p>Se você busca por objetos impressos em 3D de alta qualidade e com um atendimento personalizado, a GVI-3D é o lugar certo para você. 
            Conheça nosso catálogo e surpreenda-se com a diversidade de produtos disponíveis.</p>

        <p>Confira nossas redes socias onde nós postamos os nossos trabalhos:</p>

        <ul>
            <li>
                <a href="https://www.google.com" target="_blank">
                    <img style="height: 30px;" src="<?= Yii::getAlias('@web/icons/contact/instagram.png') ?>" alt="Instagram"> Instagram
                </a>
            </li><br>

            <li>
                <a href="https://www.google.com" target="_blank">
                    <img style="height: 30px;" src="<?= Yii::getAlias('@web/icons/contact/youtube.png') ?>" alt="Youtube"> Youtube
                </a>
            </li><br>

            <li>
                <a href="https://www.google.com" target="_blank">
                    <img style="height: 30px;" src="<?= Yii::getAlias('@web/icons/contact/facebook.png') ?>" alt="Facebook"> Facebook
                </a>
            </li>
        </ul>

        <p>Entre em contato com a gente pelo:</p>

        <ul>
            <li>
                <a href="https://www.google.com" target="_blank">
                    <img style="height: 30px;" src="<?= Yii::getAlias('@web/icons/contact/instagram.png') ?>" alt="Instagram"> Instagram
                </a>
            </li><br>

            <li>
                <a href="https://www.google.com" target="_blank">
                    <img style="height: 30px;" src="<?= Yii::getAlias('@web/icons/contact/whatsapp.png') ?>" alt="Youtube"> Whatsapp
                </a>
            </li><br>

            <li>
                <a href="https://www.google.com" target="_blank">
                    <img style="height: 30px;" src="<?= Yii::getAlias('@web/icons/contact/telegram.png') ?>" alt="Youtube"> Telegram
                </a>
            </li><br>

            <li>
                <a href="https://www.google.com" target="_blank">
                    <img style="height: 30px;" src="<?= Yii::getAlias('@web/icons/contact/email.png') ?>" alt="Youtube"> email
                </a>
            </li>

        </ul>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        $("div:hidden").fadeIn("slow");
    });
    
</script>