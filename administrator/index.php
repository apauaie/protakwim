<?php

include ("../installation/config_check.php");
if ($flag_config==0)
header("Location: production/senarai_ceramah.php");
else
header("Location: ../installation");

?>
