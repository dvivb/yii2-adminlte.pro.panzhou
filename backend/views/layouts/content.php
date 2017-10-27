<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <?php if(isset($this->params['tabs']) && !empty($this->params['tabs'])) {?>
            <ul class="nav nav-tabs">
                <?php foreach ($this->params['tabs'] as $url => $text) { ?>
                    <li <?php if(strpos(Yii::$app->request->url, $url) !== false) { ?>class="active"<?php } ?>>
                    <?php if(strpos(Yii::$app->request->url, $url) !== false) { ?>
                        <a href="" ><?= $text; ?></a>
                    <?php } else { ?>
                        <a href="<?= $url; ?>" ><?= $text; ?></a>
                    <?php } ?>

                    </li>
                <?php } ?>

            </ul>
            <?php } else { ?>
                <h1>
                    <?php
                    if ($this->title !== null) {
                        echo \yii\helpers\Html::encode($this->title);
                    } else {
                        echo \yii\helpers\Inflector::camel2words(
                            \yii\helpers\Inflector::id2camel($this->context->module->id)
                        );
                        echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                    } ?>
                </h1>
            <?php } ?>
        <?php } ?>

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong><?= date('Y') ?> Copyright &copy; 盘州市房屋征收补偿管理系统 .</strong> All rights
    reserved.
</footer>


<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>