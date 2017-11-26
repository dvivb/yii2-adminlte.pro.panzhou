$(function() {
    $('.commit-btn-flow-start').click(function () {
        var id = $(this).attr('data');
        var type = $(this).attr('data-type');
        $.confirm({
            title: '发起审批',
            content: "备注信息:&nbsp;&nbsp;&nbsp;<input style='float:none' class='col-lg-8 remark' value='请审批' name='remark'>",
            buttons: {
                formSubmit: {
                    text: '提交',
                    btnClass: 'btn-blue',
                    action: function () {
                        var remark = $('.remark').val();
                        $.get('/houselevy/houselevy-total/applys/'+id+'/'+type+'/'+remark,function(res){
                            if(res.code == 1){
                                alert("申请拨款成功");
                                location.href = location.href;
                            }else{
                                alert(res.msg);
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
        })
    })
    $('.commit-btn-approval').click(function () {
            var id = $(this).attr('data');
            var sourceType = $(this).attr('data-source-type');
            $.confirm({
                title: '处理审批',
                content: function () {
                    var self = this;
                    return $.ajax({
                        url: 'houselevy/houselevy-total/approval-list/'+id+'/'+sourceType,
                        dataType: 'json',
                        method: 'get'
                    }).done(function (response) {
                        var content ='<div>';
                        for(var i in response){
                             content += '<p><span><b>第'+(parseInt(i)+1)+'步:</b>&nbsp;&nbsp;&nbsp;&nbsp;</span>'+response[i].username+'&nbsp;&nbsp;&nbsp;&nbsp;<span><b>备注:</b>&nbsp;&nbsp;&nbsp;&nbsp;'+response[i].remarks+'</span></p><p><b>时间:</b>'+response[i].created_at+'</p><hr>';
                        }
                        content +='</div>';
                        content += '<div><select style="float:none" class="col-lg-12 agree"> <option vlaue="1">同意</option><option vlaue="2">拒绝</option></select></div><br>';
                        content += '<div><input style="float:none" class="col-lg-12 remarks" name="remarks" value="同意"></div>';
                        content += '<div><input style="float:none" type="hidden" class="source-type"  name="source-type" value="sourceType"></div>';
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
                            var agree = $('.agree').val();
                            var remarks = $('.remarks').val();
                            var sourceType = $('.source-type').val();

                            $.get('/houselevy/houselevy-total/approval/'+id+'/'+agree+'/'+remarks+'/'+sourceType,function(res){
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




})