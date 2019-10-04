<!DOCTYPE html>
<html>
<title>Usuarios</title>
<body>

<?php
session_start();
session_destroy();
header("location: index.php?cerrar_session");
?>

</body>
</html> 