<?php

require '_DBConnection.php';

$query = "update Users set userprofileid = 1 where id = 100";
//$query = "select * from Users where id = 100";

$retcode = mysqli_query($connect, $query);

//echo 'Return Code: '.(is_null($retcode) ? 'Nothing returned' : $retcode);

echo 'Error Code: '.mysqli_errno($connect);
?>