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
<!--                <a href="#"><i class="circle text-success"></i> 在线</a>-->
<!--            </div>-->
<!--        </div>-->

        <!-- search form -->
        <!--  form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="search"></i>
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
                    ['label' => '首页', 'icon' => 'tv', 'url' => ['/workbench/default/index']],
                    ['label' => '项目管理', 'icon' => 'cube', 'url' => '#',
                        'items'=>[
                            ['label' => '项目列表', 'icon' => 'archive', 'url' => ['/project/project/index']],
//                            ['label' => '项目新增', 'icon' => 'archive', 'url' => ['/project/project/add']],
                        ]
                    ],
                    ['label' => '房屋征收', 'icon' => 'building-o', 'url' => '#',
                        'items'=>[
//                            ['label' => '房屋征补信息管理', 'icon' => 'archive', 'url' => ['/project/project/index/1']],
//                            ['label' => '新增花名册', 'icon' => 'archive', 'url' => ['/project/project/add/2']],

                            ['label' => '房屋征补信息管理', 'icon' => 'archive', 'url' => ['/houselevy']],
                            ['label' => '过渡费发放', 'icon' => 'archive', 'url' => ['/interim/interim-list/index']],
                        ]
                    ],
                    ['label' => '土地征补', 'icon' => 'map', 'url' => '#',
                        'items'=>[
//                            ['label' => '土地征补信息管理', 'icon' => 'archive', 'url' => ['/project/project/index/2']],
//                            ['label' => '新增花名册', 'icon' => 'archive', 'url' => ['/project/project/add/1']],

                            ['label' => '土地征补信息管理', 'icon' => 'archive', 'url' => ['/landlevy']],
                        ]
                    ],
                    [
                        'label' => '安置信息',
                        'icon' => 'home',
                        'url' => '#',
                        'items' => [
                            ['label' => '棚改安置房', 'icon' => 'archive', 'url' => ['/arrange/residential/index']],
                            ['label' => '商品安置房', 'icon' => 'building', 'url' => ['/arrange/shanty/index']],
                            ['label' => '安置信息管理', 'icon' => 'clipboard', 'url' => ['/arrange/information/index']],
                        ],
                    ],
                    ['label' => '字典管理', 'icon' => 'stack-overflow', 'url' => ['/dictionarie/dictionarie/index']],
                    ['label' => '流程管理', 'icon' => 'random', 'url' => ['/flow/flow/index']],
                    [
                        'label' => '用户管理',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => '用户', 'icon' => 'user', 'url' => ['/users/users/index']],
                            ['label' => '用户分组', 'icon' => 'user', 'url' => ['/users/user-role']],
                            ['label' => '权限', 'icon' => 'user', 'url' => ['/users/permissions/index']],
                            ['label' => '权限配置', 'icon' => 'user', 'url' => ['/users/user-permissions/index']],
                            ['label' => '秘密修改', 'icon' => 'user', 'url' => ['/users/users/change-pass']],
                        ],
                    ],
//                     ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                     ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                     ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                ],
                    
          ]
        ) ?>

    </section>

</aside>
