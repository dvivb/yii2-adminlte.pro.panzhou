<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */
// var_dump(Yii::$app->user->identity->username);exit;
?>

<header class="main-header">


    <?= Html::a('<span class="logo-mini"></span><span class="logo-lg"></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"> <?= Yii::$app->user->identity->username; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= Yii::$app->user->identity->username; ?>
                                <small><?= date('Y-m-d H:i:s',time()); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!--  div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div -->
                            <div class="pull-right">
                                <?= Html::a(
                                    '退出',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <!-- a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a -->
                </li>
            </ul>
        </div>
    </nav>
</header>

<style>
    .logo{
        background: url(/images/logo.png) no-repeat left;
        margin-left: 1.4px;
    }
    .skin-blue .main-header .navbar {
        background-color: #324156;
    }
    .skin-blue .main-header .logo{
        background-color: #324156;
    }
</style>
