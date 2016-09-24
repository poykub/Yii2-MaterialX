<?php
use app\themes\materialx\MaterialAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Alert;
use yii\helpers\Url;

MaterialAsset::register($this);

//$asset_path = Yii::$app->assetManager->getPublishedUrl('@app/themes/material/assets');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1.0, width=device-width" name="viewport">
    <link rel="shortcut icon" href="<?php echo \Yii::$app->request->BaseUrl ?>/img/fav.ico" type="image/x-icon"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?= $this->render(
        'header.php'
    ) ?>

    <div class="container" style="padding-top: 80px;">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
        <?= $content ?>
    </div>

    <!--Footer-->
    <footer class="page-footer center-on-small-only primary-color-dark">

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row kanit">

                <!--First column-->
                <div class="col-md-6 col-md-offset-1">
                    <h5 class="title">About</h5>
                    <p>About of material x.</p>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-2 col-md-offset-1">
                    <h5 class="title">Link 1</h5>
                    <ul>
                        <li><a href="#!">Submenu 1</a></li>
                        <li><a href="#!">Submenu 2</a></li>
                        <li><a href="#!">Submenu 3?</a></li>
                    </ul>
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-md-2">
                    <h5 class="title">Link 2</h5>
                    <ul>
                        <li><a href="#!">Submenu 1</a></li>
                        <li><a href="#!">Submenu 2</a></li>
                        <li><a class="white-text" href="#">Submenu 3</a></li>
                    </ul>
                </div>
                <!--/.Third column-->
            </div>
        </div>
        <!--/.Footer Links-->

        <!--Copyright-->
        <div class="footer-copyright kanit">
            <div class="container">
                &copy;<?= date('Y') ?>  MaterialX All rights reserved. Theme by <a href="http://fezvrasta.github.io/bootstrap-material-design" class="right" target="_blank">FEDERICO ZIVOLO</a>
            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <?php
    $this->registerJsFile('//code.jquery.com/jquery-1.10.2.min.js');
    $this->registerJsFile('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
    $this->registerCssFile("http://fonts.googleapis.com/icon?family=Material+Icons");
    $this->registerCssFile("https://fonts.googleapis.com/css?family=Kanit");
    $this->registerCssFile("//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css");
    ?>
    <script>
        /*$(function () {
            $.material.init();
        });*/
    </script>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
