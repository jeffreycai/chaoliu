<div class="passwordBox animated fadeInDown">
  <div class="row">

    <div class="col-md-12">
      <div class="ibox-content">

        <h2 class="font-bold">重置密码</h2>

        <p>
          输入您注册的邮箱地址，您的密码将重置并发送到您的邮箱
        </p>

        <div class="row">

          <div class="col-lg-12">

            <?php echo MySiteUser::renderForgetPasswordForm(); ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-6">
      Copyright <?php echo $settings['sitename'] ?>
    </div>
    <div class="col-md-6 text-right">
      <small>© 2015</small>
    </div>
  </div>
</div>