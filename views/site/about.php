<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <center>
        <div class="jumbotron">
            <h3 class="kanit">Material X</h3>
            <?= Html::img('@web/upload/health_network.jpg', ['alt' => 'Health Datacenter', 'class' => 'thing img-responsive']); ?>
        </div>
    </center>
</div>
