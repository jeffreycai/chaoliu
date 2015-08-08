<div class="row border-bottom">
  <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <!--
    <div class="navbar-header">
      <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
      <form role="search" class="navbar-form-custom" action="search_results.html">
        <div class="form-group">
          <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
        </div>
      </form>
    </div>
    -->
    <ul class="nav navbar-top-links navbar-right">
      <li>
        <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $user->getProfile()->getNickname() ?>.</span>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
          <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
          <li>
            <a href="#">
              <div>
                <i class="fa fa-envelope fa-fw"></i> 小张签证材料需补交
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <i class="fa fa-envelope fa-fw"></i> 小李要交学费第一期
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <i class="fa fa-envelope fa-fw"></i> 小王递签已3个月，需催签
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <div class="text-center link-block">
              <a href="#">
                <strong>查看所有提醒</strong>
                <i class="fa fa-angle-right"></i>
              </a>
            </div>
          </li>
        </ul>
      </li>


      <li>
        <a href="<?php echo uri('users/logout') ?>">
          <i class="fa fa-sign-out"></i> 登出
        </a>
      </li>
      <!--
      <li>
        <a class="right-sidebar-toggle">
          <i class="fa fa-tasks"></i>
        </a>
      </li>
      -->
    </ul>

  </nav>
</div>