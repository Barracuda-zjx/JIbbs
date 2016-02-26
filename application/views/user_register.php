<?php //include 'common/header_common.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">��ӭע��</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <?php echo form_open('reg', array('class' => 'form-horizontal', 'role' => 'form'));?>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">�û���</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="��ʹ��3-12λ����Сд��ĸ���������">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">����</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">����</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="captcha" class="col-sm-2 control-label">��֤��</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Captcha">
                                </div>
                                <div class="col-sm-5" id="cap_img" onclick="get_cap_img()">
                                    <?php echo $cap_image; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">ע��</button>
                                </div>
                            </div>
                            <script type="text/javascript">
                            function get_cap_img(){
                              $.ajax({
                                url: '<?php echo base_url('user/refresh_cap_image');?>',
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
