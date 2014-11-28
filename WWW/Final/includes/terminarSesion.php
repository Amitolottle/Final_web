<!-- Al precionar click en salir, se elimina la sesión actual
y se redirige a login -->
<?php
session_start();
session_destroy();

?>
