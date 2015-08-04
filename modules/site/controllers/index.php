<?php
echo "<meta charset='utf-8'>";
echo is_login() ? '你好，' . MySiteUser::getCurrentUser()->getUserName() . '。 您已登录。 您可以<a href="'.uri('users/logout').'">登出</a>' : '您还未登录，点击<a href="'.uri('users').'">登录</a>。 <br />用户名： cui<br />密码： cuicui';