(function () {
                new Vue({
                    el: '#app',
                    data: function () {
                        return {
                            waitingDialog: false,
                            errorDialog: false,
                            active: 2,
                            cardId: 1,
                            labelPosition: 'right',
                            payType: '',
                            order: {}
                        }
                    },
                    methods: {
                        // 取消
                        cancel: function () {

                        },

                        // 去付款
                        goToPay: function () {
                            // 打开支付完成确认对话框
//                        	window.location.href='/pay/pay/alipay/'+orderSn;
                            this.waitingDialog = true;
                            window.open('/pay/pay/'+this.payType+'/'+orderSn);    
                        },

                        // 完成
                        finish: function () {
                        },

                        // 付款遇到问题
                        errorInPay: function () {
                            this.errorDialog = true;
                            this.waitingDialog = false;
                        },

                        // 已完成付款
                        finishPayment: function () {
                        	window.location.href='/pay/pay/ali-return/?out_trade_no='+orderSn;
                        },

                        // 重新支付
                        repay: function () {
                            this.errorDialog = false;
                            this.waitingDialog = true;
                        },

                        // 查询充值记录
                        checkPayRecord: function () {
                            // 跳转到查询充值记录页
                        }
                    },
                    mounted: function () {
                        this.$el.style.display = "";
                    }
                })
            })();