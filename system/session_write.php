<?
    session_start();
    $sessionName = $_POST['session_name'];
    if (isset($sessionName)) {
        $_SESSION[$sessionName] = $_POST['session_value'];
    }
?>