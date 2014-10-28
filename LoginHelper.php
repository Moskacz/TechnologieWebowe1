<?php

class LoginHelper {
    public static  function isUserLogged() {
        if ($_SESSION['logged'] != 1) {
            return 0;
        }
        return 1;
    }

    public static function logUser() {
        $_SESSION['logged'] = 1;
    }

    public static function logoutUser() {
        $_SESSION['logged'] = 0;
    }
}

