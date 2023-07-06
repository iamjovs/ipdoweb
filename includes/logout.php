<?php
	session_start();

// unset all session variables
	$_SESSION = array();

	// remove the session cookie
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	// destroy the session
	session_destroy();
	if (!isset($_SESSION['user_id'])) {
        // user is already logged in, redirect to dashboard page
        header("Location: ../login.php");
        exit();
    }
?>