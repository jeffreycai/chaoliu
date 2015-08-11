<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <li class="nav-header">
        <div class="dropdown profile-element"> <span>
            <img alt="image" class="img-circle" src="<?php echo $user->getProfile()->getThumbnailUrl() ?>" />
          </span>
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $user->getProfile()->getNickname() ?></strong>
              </span> <span class="text-muted text-xs block">
              <?php echo $user->getCompany(); ?> -   
              <?php 
              $roles = array();
              foreach ($user->getRoles() as $role) {
                $roles[] = $role->getName();
              }
              echo implode(', ', $roles);
              ?> <b class="caret"></b></span> </span> </a>
          <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <?php if ($user->hasPermission('更新自己的信息')): ?>
            <li><a href="<?php echo uri('profile') ?>">个人信息</a></li>
            <li class="divider"></li>
            <?php endif; ?>
            <li><a href="<?php echo uri('users/logout') ?>">登出</a></li>
          </ul>
        </div>
        <div class="logo-element">
          ct21
        </div>
      </li>
      
      <?php if ($user->hasPermission('管理本公司用户')): $current_url = get_cur_page_url();?>
      <li <?php echo_link_active_class('/^siteuser/', $current_url) ?>>
        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">用户管理</span> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li <?php echo_link_active_class('/^siteuser\/list/', $current_url) ?>><a href="<?php echo uri('siteuser/list') ?>">所有本公司用户</a></li>
          <li <?php echo_link_active_class('/^siteuser\/add/', $current_url) ?>><a href="<?php echo uri('siteuser/add') ?>">添加新用户</a></li>
          <?php if ($user->hasPermission('管理用户权限')): ?>
          <li <?php echo_link_active_class('/^siteuser\/permission/', $current_url) ?>><a href="<?php echo uri('siteuser/permission') ?>">管理用户权限</a></li>
          <?php endif; ?>
        </ul>
      </li>
      <?php endif; ?>
      
      <?php if ($user->hasPermission('管理自己的客户')): ?>
      <li <?php echo_link_active_class('/^client/', $current_url) ?>>
        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">客户管理</span> <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li <?php echo_link_active_class('/^client\/list/', $current_url) ?>><a href="<?php echo uri('client/list') ?>">列表</a></li>
          <li <?php echo_link_active_class('/^client\/add/', $current_url) ?>><a href="<?php echo uri('client/add') ?>">添加新客户</a></li>
        </ul>
      </li>
      <?php endif; ?>
    </ul>

  </div>
</nav>