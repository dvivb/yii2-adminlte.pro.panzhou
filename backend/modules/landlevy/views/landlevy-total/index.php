<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LandlevyTotalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
backend\assets\JConfirmAsset::register($this);
    $this->title = '土地征补项目花名册汇总';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-total-index">
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create?project_id='.$_GET['LandlevyTotalSearch']['project_id']], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "<p style='float: right;margin-top: 10px;'>显示 {begin} - {end} 共 {totalCount} 条</p>",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'project_id',
//            'periods',
            'periods'=>['attribute'=>'periods','value'=>function($dataProvider){
//                return '<a href="/landlevy/landlevy-list?LandlevyListSearch[landlevy_total_id]='.$dataProvider->id.'">'.$dataProvider->periods.'</a>';
                return  Html::a('第（'. $dataProvider->periods .'）期',"landlevy-list?LandlevyListSearch[landlevy_total_id]={$dataProvider->id}", ['target'=> 'self']);
            }, 'format' => 'raw',],
            'total_households',
            'total_area',
             'total_amount',
             'operator',
//             'approval',
            'approval'=>['attribute'=>'approval','value'=>function($dataProvider){
                $var = '';
                switch($dataProvider->approval){
                    case 0;
                        $var ='未提交';
                        break;
                    case 1:
                        $var ='提交拨款';
                        break;
                    case 2:
                        $var ='初审通过';
                        break;
                    case 3:
                        $var ='业务主管审批通过';
                        break;
                    case 4:
                        $var ='分管领导审批通过';
                        break;
                    case 5:
                        $var ='主要领导审批通过';
                        break;
                    default:
                        $var ='流程结束';
                        break;
                }
                return $var;
            }],
             'created_at',
             'updated_at',

             ['class' => 'yii\grid\ActionColumn',
                //'template'=>'{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                'buttons' => ['view'=>function ($url,$dataProvider){
                    if($dataProvider->approval ==0)
                        return '<button class="btn btn-info commit-btn" data='.$dataProvider->id.'>申请拨款</button>';
                    else
                        return '<a href="/landlevy/landlevy-total/view?id='.$dataProvider->id.'" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
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
<?php $this->beginBlock('houseTotalindex') ?>
      $(function(){
<!--     	  $('.commit-btn').click(function(){ -->
<!--     	        var id = $(this).attr('data'); -->
<!--     			var ifTrue = confirm("确认提交申请拨款?"); -->
<!--                 if(ifTrue){ -->
<!--                     $.get('/landlevy/landlevy-total/applys/'+id,function(res){ -->
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
                            $.get('/landlevy/landlevy-total/applys/'+id+'/'+userid,function(res){
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
<?php $this->registerJs($this->blocks['houseTotalindex'], \yii\web\View::POS_END); ?>