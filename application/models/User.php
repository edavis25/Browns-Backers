<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Model.php';

class User extends Model {
    protected $name;
    protected $username;
    protected $password;

    public function __construct($properties = array()) {
        parent::__construct(safeGet($properties, 'id', null));

        $this ->     setName(safeGet($properties, 'name',     null));
        $this -> setUsername(safeGet($properties, 'username', null));
        $this -> setPassword(safeGet($properties, 'password', null));
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    public function getUsername() {
        return $this->username;
    }
    public function setUsername($name) {
        $this->username = $name;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($pass) {
        $this->password = $pass;
    }

    public static function getUsers() {
        $rows = self::getDb()->get('users')->result_array();
        return self::makeObjectsFromRows($rows, self::class);
    }

    public static function isValidUser($username, $pass) {
        $user = self::getDb()->where('username', $username)->get('users')->row_array();
        if ($user) {
            if (password_verify($pass, $user['password'])) {
                return true;
            }
        }
        return false;
    }
}