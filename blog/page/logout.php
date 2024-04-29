<?php

unset($_SESSION['user']);
set_flash_message("Déconnexion réussie", "success");
header('Location: index.php');
exit;
