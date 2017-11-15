<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InterimDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
backend\assets\JConfirmAsset::register($this);
$this->title = '过渡费明细列表';
$this->params['breadcrumbs'][] = ['label' => '过渡费项目列表', 'url' => ['interim-list/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-detail-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "<p style='float: right;margin-top: 10px;'>显示 {begin} - {end} 共 {totalCount} 条</p>",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'id_number',
//            'project_id',
             'project_name',
             'house_area',
             'biz_house_area',
             'amount',
             'sign_time',
             'start_time',
             'end_time',
            // 'created_at',
            // 'updated_at',

             ['class' => 'yii\grid\ActionColumn',
                //'template'=>'{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                'buttons' => ['view'=>function ($url,$dataProvider){
                    if($dataProvider->approval ==0)
                        return '<button class="btn btn-info commit-btn" data='.$dataProvider->id.'>申请拨款</button>';
                    else
                        return '<a href="/interim/interim-detail/view?id='.$dataProvider->id.'" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
                }]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<style>
    .grid-view{
        margin-top: 10px;
        padding: 10px;
        background: #fcfcfd;
    }

    .btn-success {
        float: left;
        margin: 16px;
    }.user_role ,.user_id{
	   height:40px;
    }
</style>
<?php $this->beginBlock('interim') ?>
      $(function(){
<!--     	  $('.commit-btn').click(function(){ -->
<!--     	        var id = $(this).attr('data'); -->
<!--     			var ifTrue = confirm("确认提交申请拨款?"); -->
<!--                 if(ifTrue){ -->
<!--                     $.get('/interim/interim-detail/applys/'+id,function(res){ -->
<!--                         if(res.code == 1){ -->
<!--                             alert("申请拨款成功"); -->
<!--                             location.href = location.href; -->
<!--                         }else{ -->
<!--                            alert("申请拨款失败"); -->
<!--                         } -->
                        
<!--                     },'json') -->
<!--                 }else{ -->
<!--                     return false -->
<!--                 } -->
<!--               }) -->
              
              $('.commit-btn').click(function(){
              var id = $(this).attr('data');
              $.confirm({
                title: '发起审批',
                content: function () {
                    var self = this;
                    return $.ajax({
                        url: '/users/users/get-user-group',
                        dataType: 'json',
                        method: 'get'
                    }).done(function (response) {
                        var content = '<select class="user_role col-lg-12"> <option>请选择用户分组</option>';
                        for(var i in response) {
                        console.log(i);
                            content += '<option value="'+response[i].id+'">'+response[i].role_name+'</option>';
                        }
                        content += '</select><br><br><select class="user_id col-lg-12"><option>请选择用户</option></select><br><br>';
                        content +='<div style="clear: both"></div>';
                        self.setContent(content);
                    }).fail(function(){
                        self.setContent('Something went wrong.');
                    });
                },
                buttons: {
                    formSubmit: {
                        text: '提交',
                        btnClass: 'btn-blue',
                        action: function () {
                            var userid = $('.user_id').val();
                            $.get('/interim/interim-detail/applys/'+id+'/'+userid,function(res){
                        if(res.code == 1){
                            alert("申请拨款成功");
                            location.href = location.href;
                        }else{
                           alert("申请拨款失败");
                        }
                        
                         },'json')
                        }
                    },
                    cancel: {
                        text: '关闭',
                            action: function () {
                        }
                    },
                },
                onContentReady: function () {
                    var self = this;
                },
                columnClass: 'small'
            })
    })
    
    
    $(document).on('change','.user_role',function(){
         var role_id = $(this).val();
         if(role_id >0 ){
           $.get("/users/users/get-users?role_id="+role_id,function(res){
            $str = '';
            for(var i in res){
                $str += '<option value="'+res[i].id+'">'+res[i].username+'</option>';
            }
            if($str == ''){
                $str = '<option>该分组无用户</option>';
            }
            $('.user_id').html($str)
           },'json')
         }else{
            $str = '<option>改分组无用户</option>';
            $('.user_id').html($str)
         }
    
    })
          })
     
<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['interim'], \yii\web\View::POS_END); ?>