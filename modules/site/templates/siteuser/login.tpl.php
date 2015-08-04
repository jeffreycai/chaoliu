<div class="middle-box text-center loginscreen animated fadeInDown">
  <div>
    <div>

      <h1 class="logo-name" style="font-size: 144px">潮流</h1>

    </div>
    <h3><?php echo $settings['sitename'] ?></h3>
    <p>请先登录再使用潮流信息管理系统
    </p>

    <div style="text-align: left;">
    <?php echo MySiteUser::renderLoginForm() ?>
    </div>
    
    <p class="m-t"> <small>潮流留学移民投资 &copy; 2015</small> </p>
  </div>
</div>
    
<!--
<div class="middle-box text-center loginscreen animated fadeInDown">
  <div>
    <div>

      <h1 class="logo-name" style="font-size: 144px">潮流</h1>

    </div>
    <h3>潮流留学移民投资</h3>
    <p>登录并使用潮流信息管理系统
    </p>
    <p>请输入您的用户名和密码</p>
    <form class="m-t" role="form" action="#">
      <div class="form-group">
        <input type="email" class="form-control" placeholder="Username" required="">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" required="">
      </div>
      <div class="form-group" style="text-align: left;">
        <label>
          <input type="checkbox" value="1" name="remember"> 30天内记住我
        </label>
      </div>
      <button type="submit" class="btn btn-primary block full-width m-b">登录</button>

      <a href="#"><small>忘记密码 ?</small></a>
    </form>
    <p class="m-t"> <small>潮流留学移民投资 &copy; 2015</small> </p>
  </div>
</div>
-->