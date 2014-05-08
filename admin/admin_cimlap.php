<?php
$smarty_admin = new Smarty();
$smarty_admin->assign('cikkx', $cikkx);
$admin_torzs = $smarty_admin->fetch('admin_cimlap.html');

