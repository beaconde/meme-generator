<?php

class Model {

    private $conn;
    private static $instance;

    private function __construct() {
        $this->conn = new PDO("mysql:host=db;dbname=meme-generator", "meme-generator", "pestillo");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }


    // Usuarios

    public function crea_usuario($username, $password, $image = "anon.png") {
        $statement = $this->conn->prepare("insert into usuarios (username, password, image) values(:username, :password, :image)");
        $statement->execute(array(":username" => $username, ":password" => crypt($password, "juas"), ":image" => $image));
        return $statement->rowCount();
    }

    public function borra_usuario($username) {
        $statement = $this->conn->prepare("delete from usuarios where username = :username");
        $statement->execute(array(":username" => $username));
        return $statement->rowCount();
    }

    public function actualiza_usuario($new_username, $new_password, $username) {
        $statement = $this->conn->prepare("update usuarios set username = :new_username, password = :new_password where username = :username");
        $statement->execute(array(":new_username" => $new_username, ":new_password" => crypt($new_password, "juas"), ":username" => $username));
        return $statement->rowCount();
    }

    public function usuarios() {
        return $this->conn->query("select * from usuarios")->fetchAll(PDO::FETCH_CLASS, "Usuario", array("follow" => true));
    }

    public function check_usuario($username, $password) {
        $statement = $this->conn->prepare("select count(*) from usuarios where username = :username and password = :password");
        $statement->execute(array(":username" => $username, ":password" => crypt($password, "juas")));
        return $statement->fetch()[0] == 1;
    }

    public function memes_usuario($id_usuario, $follow = false) {
        $statement = $this->conn->prepare("select * from memes where usuario = :id_usuario");
        $this->execute(array(":id_usuario" => $id_usuario));
        return $statement->fetchAll(PDO::FETCH_CLASS, "Meme", array("follow" => $follow));
    }

    // Memes


}


class Usuario {
    private $id;
    private $username;
    private $image;
    private $memes;

    public function __construct($follow = true) {
        if ($follow) {
            $this->memes = Model::getInstance()->memes_usuario($this->id);
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getImage() {
        return $this->image;
    }

    public function getMemes() {
        return $this->memes;
    }

}



