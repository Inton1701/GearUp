<?php
function check_session() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /login");
        exit(); 
    }
}
?>