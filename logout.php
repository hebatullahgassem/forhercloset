<html>
<head>
<title>forhercloset/logout</title>
</head>
<body>
</body>
</html>



<?php
session_start();
unset($_SESSION['uid']);
unset($_SESSION['email']);

?>
<script>
window.location = "login.php"
</script>