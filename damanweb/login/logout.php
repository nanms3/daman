<?php
session_start();//بدا الجلسه
session_unset();//حذف الجلسه
session_destroy();
header('location:Users.php');//مضاف مؤخرأ
exit();
?>