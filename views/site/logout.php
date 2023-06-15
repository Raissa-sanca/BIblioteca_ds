<?php
session_unset();
session_destroy();
header("location: ../site/index.php");