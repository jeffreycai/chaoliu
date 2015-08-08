<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>编辑个人信息 <small><?php echo $user->getProfile()->getNickname() ?>.</small></h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
<?php echo Message::renderMessages() ?>
<?php echo MySiteUser::renderUpdateFormFrontend($user) ?>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>