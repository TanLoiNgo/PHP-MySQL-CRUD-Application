<?php

if(isset($_POST['submit'])){

    setSiteStatus($db_con);

   echo("<meta http-equiv='refresh' content='1'>");
}
?>