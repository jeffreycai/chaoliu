<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2><?php echo $title ?></h2>
    <ol class="breadcrumb">
<?php
$i = 0;
foreach ($breadcrumb as $name => $url): $i++ ?>
  <?php if ($i == sizeof($breadcrumb)): ?>
    <li class="active"><strong><?php echo $name ?></strong></li>
  <?php else: ?>
    <li><a href="<?php echo $url ?>"><?php echo $name ?></a></li>
  <?php endif; ?>
<?php endforeach; ?>
    </ol>
  </div>
  <div class="col-lg-2">

  </div>
</div>