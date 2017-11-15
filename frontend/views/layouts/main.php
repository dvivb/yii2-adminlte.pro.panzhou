<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use Zend\Validator\InArray;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody();?>

    <div class=" container-box">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

    <div class="footer">
        <div class="footer-box">
           <!--  <div class="pic">
                <div class="wx">
                    <a href=""></a>
                    <div class="wx-pic" ><img src="img/wx_pic.jpg" alt=""></div>
                </div>
                <a href="" class="wb"></a>
            </div> -->
        </div>
    </div>

<?php $this->endBody() ?>
<style>
.container-box .breadcrumb {margin-bottom:0}   
</style>
</body>
</html>
<?php $this->endPage() ?>
