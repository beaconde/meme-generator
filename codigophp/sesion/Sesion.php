<?php

require_once "../model/bd.php";

class Sesion {

    private static $model;

    public function __construct() {
        self::$model = Model::getInstance();
        session_start();
    }

    public function log_in($username, $password) {
        if(self::$model->check_usuario($username, $password)) {
            $_SESSION["username"] = $username;
            session_write_close();
            header("Location: ../meme-generator/perfil.php");
        } else {
            header("Location: login.php?text=Usuario y/o contraseña incorrectos");
        }
    }

    public function log_out() {
        unset($_SESSION["username"]);
        session_destroy();
        header("Location: ../sesion/login.php");
    }

    public function check_logged_in() {
        if(!isset($_SESSION["username"])) {
            header("Location: ../sesion/login.php");
        }
    }

}
