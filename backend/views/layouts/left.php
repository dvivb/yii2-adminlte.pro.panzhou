<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
<!--        <div class="user-panel">-->
<!--            <div class="pull-left image">-->
<!--                <img src="--><?//= $directoryAsset ?><!--/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
<!--            </div>-->
<!--            <div class="pull-left info">-->
<!--                <p>管理员</p>-->
<!---->
<!--                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>-->
<!--            </div>-->
<!--        </div>-->

        <!-- search form -->
        <!--  form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => '首页', 'icon' => 'fa fa-tv', 'url' => ['/workbench/default/index']],
                    ['label' => '项目管理', 'icon' => 'fa fa-cube', 'url' => ['#'],
                        'items'=>[
                            ['label' => '项目列表', 'icon' => 'fa fa-archive', 'url' => '/project/project/index'],
                            ['label' => '项目新增', 'icon' => 'fa fa-archive', 'url' => '/project/project/add'],
                        ]
                    ],
                    ['label' => '房屋征收', 'icon' => 'fa fa-building-o', 'url' => ['#'],
                        'items'=>[
                            ['label' => '房屋征补信息管理', 'icon' => 'fa fa-archive', 'url' => '/project/project/index/1'],
                            ['label' => '新增花名册', 'icon' => 'fa fa-archive', 'url' => '/project/project/add'],
                        ]
                    ],
                    ['label' => '土地征补', 'icon' => 'fa fa-map', 'url' => ['#'],
                        'items'=>[
                            ['label' => '土地征补信息管理', 'icon' => 'fa fa-archive', 'url' => '/project/project/index/2'],
                            ['label' => '新增花名册', 'icon' => 'fa fa-archive', 'url' => '/project/project/add'],
                        ]
                    ],
                    [
                        'label' => '安置信息',
                        'icon' => 'fa fa-home',
                        'url' => '#',
                        'items' => [
                            ['label' => '棚改安置房', 'icon' => 'fa fa-archive', 'url' => '/arrange/residential/index',],
                            ['label' => '商品安置房', 'icon' => 'fa fa-building', 'url' => '/arrange/shanty/index',],
                            ['label' => '安置信息管理', 'icon' => 'fa fa-clipboard', 'url' => '/arrange/information/index',],
                        ],
                    ],
                    ['label' => '字典管理', 'icon' => 'fa fa-stack-overflow', 'url' => ['/dictionarie/dictionarie/index']],
                    [
                        'label' => '用户管理',
                        'icon' => 'fa fa-users',
                        'url' => '#',
                        'items' => [
                            ['label' => '用户', 'icon' => 'fa fa-user', 'url' => '/user/index',],
                        ],
                    ],
//                     ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                     ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
//                     ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                ],
                    
          ]
        ) ?>

    </section>

</aside>
