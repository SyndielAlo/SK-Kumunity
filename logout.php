<?php
session_start();
include("includes/config.php");
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="index.php";
</script>
