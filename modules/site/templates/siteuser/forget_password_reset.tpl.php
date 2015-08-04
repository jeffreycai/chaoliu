<div class="passwordBox animated fadeInDown">
  <div class="row">

    <div class="col-md-12">
      <div class="ibox-content">

        <h2 class="font-bold">请输入您的新密码</h2>

        <div class="row">

          <div class="col-lg-12">

            <?php echo SiteUser::renderPasswordResetForm(); ?>
            
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