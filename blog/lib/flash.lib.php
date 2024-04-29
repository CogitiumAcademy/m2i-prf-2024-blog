<?php

// TODO 4. CHALLENGE : Notification Flash, Flash Messages, ...

// TODO a. Créer une fonction permettant la mise en place d'une notification flash
function set_flash_message($message, $type = 'success') {
    // Je stock dans mon tableau en session le nouveau message
    $_SESSION['flash_message'][] = [
        'type' => $type,
        'message' => $message
    ];
}

// b. Créer une autre fonction permettant d'afficher la notification flash et la détruire
function get_flash_messages() {
    // Je vérifie l'existence de message en session
    if (isset($_SESSION['flash_message'])) {

        // Je parcours l'ensemble des messages, un par un
        $messages = null;
        foreach ($_SESSION['flash_message'] as $flash_message) {
            $message = $flash_message['message'];
            $type = $flash_message['type'];

            // Pour chaque message, j'affiche une alerte bootstrap.
            $messages .= "<div role='alert' class='alert alert-dismissible fade show alert-$type'>$message</div>";
        }

        // Tous mes messages sont affichés, je détruis la session de message.
        unset($_SESSION['flash_message']);
        return $messages;
    }
    return false;
}

