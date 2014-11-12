
<html>
<head>
	<title></title>
</head>
<body>
<!-- Al precionar click en salir, se elimina la sesión actual
y se redirige a login -->
<?php
session_start();
session_destroy();
echo"<meta http-equiv='refresh' content='0.5;url=/Final/index.php'>";

?>
</body>
</html>