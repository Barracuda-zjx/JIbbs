<?php
include 'common/header_common.php';
include 'common/text_validation.php';
?>
    <script type='text/javascript'>
		$(document).ready(function()
		{
			// 表单值改变
			
			// 检查 username 是否有效
			$("#username").change(function()
			{
				text_valid
				(
					$("#username").val(),
					"<?php echo $this->user_model->$validation_rules['username'];?>",
					'用户名',
					$.username_change
				);
			});
			
			// 检查 password 是否有效
			$("#password").change(function()
			{
				text_valid(
					$("#password").val(),
					'trim|required|min_length[6]|max_length[20]',
					'密码',
					$.password_change
				);
			});
			
			// 检查 password_confirm 是否和 password 一致
			$("#password_confirm").change(function()
			{
				$.password_reconfirm();
			});
			
			// 检查 email 是否有效
			$("#email").change(function()
			{
				text_valid(
					$("#email").val(),
					'trim|required|valid_email|is_unique[bbs_user.email]',
					'邮箱',
					$.email_change
				);
			});
			
			// 检查 captcha 是否正确
			$("#captcha").change(function()
			{
				text_valid(
					$("#captcha").val(),
					'trim|callback_captcha_check',
					'验证码',
					$.captcha_change
				);
			});
			
			
			// 验证后回调函数
			$.extend(
			{
				username_change: function(data)
				{
					//var output;
					if(data=='success')
					{
						data='';
					}
					else
					{
						
					}
					$("#username_error").html(data);
				},
				
				password_change: function(data)
				{
					$("#password_error").html(data);
					$.password_reconfirm();
				},
				
				password_confirm_change: function(data)
				{
					$("#password_confirm_error").html(data);
				},
				
				email_change: function(data)
				{
					$("#email_error").html(data);
				},
				
				captcha_change: function(data)
				{
					$("#captcha_error").html(data);
				},
				
				password_reconfirm: function()
				{
					if ($("#password_confirm").val()=='')
					{
						$.password_confirm_change('');
					}
					else if($("#password").val()==$("#password_confirm").val())
					{
						$.password_confirm_change('success');
					}
					else
					{
						$.password_confirm_change('两次输入密码不一致');
					}
				}
				
			});
		});
	</script>
    
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">欢迎注册</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <?php echo form_open('user/register', array('class' => 'form-horizontal', 'role' => 'form'));?>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="请使用3-12位长度小写字母或数字组合">
                                </div>
                                <label for="username" class="col-sm-5 control-label-left" id="username_error"></label>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <label for="password" class="col-sm-5 control-label-left" id="password_error"></label>
                            </div>
                            <div class="form-group">
                                <label for="password_confirm" class="col-sm-2 control-label">确认密码</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                                </div>
                                <label for="password_confirm" class="col-sm-5 control-label-left" id="password_confirm_error"></label>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">邮箱</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <label for="email" class="col-sm-5 control-label-left" id="email_error"></label>
                            </div>
                            <div class="form-group">
                                <label for="captcha" class="col-sm-2 control-label">验证码</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Captcha">
                                </div>
                                <div class="col-sm-3" id="cap_img" onclick="get_cap_img()">
                                    <?php echo $cap_image; ?>
                                </div>
                                <label for="captcha" class="col-sm-3 control-label-left" id="captcha_error"></label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">注册</button>
                                </div>
                            </div>
                            <script type="text/javascript">
                            function get_cap_img(){
                              $.ajax({
                                url: '<?php echo site_url('user/refresh_cap_image');?>',
                                success: function(data) {
                                  $("#cap_img").html(data);
                              }});
                            }
                            </script>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-md-8 -->

<?php //include 'common/sidebar_common.php';
?>

        </div><!-- /.row -->
    </div><!-- /.container -->

<?php //include 'common/footer_common.php';
?>
</body>
</html>
