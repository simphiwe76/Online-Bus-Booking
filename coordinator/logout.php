<?php

        session_start();
        unset($_SESSION['cooEmail']);
        unset($_SESSION['cooid']);
        session_destroy();
        echo "<script>location.replace('../index.php');</script>";

?>
