<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Model.php';

class Recipient_model extends Model {
    protected $first_name;
    protected $last_name;
    protected $email;

    public function __construct($fields = array()) {
        parent::__construct(safeGet($fields, 'id', null));

        $this -> setFirstName(safeGet($fields, 'first_name', null));
        $this ->  setLastName(safeGet($fields, 'last_name',  null));
        $this ->     setEmail(safeGet($fields, 'email',      null));
    }

    public function getFirstName() {
        return $this->first_name;
    }
    public function setFirstName($name) {
        $this->first_name = $name;
    }
    public function getLastName() {
        return $this->last_name;
    }
    public function setLastName($name) {
        $this->last_name = $name;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRecipientsCount() {
        return $this->db->count_all('recipients');
    }

    public static function getPaginatedRecipients($limit, $offset) {
        self::getDb()->order_by('last_name',  'ASC');
        self::getDb()->order_by('first_name', 'ASC');
        $rows = self::getDb()->get('recipients', $limit, $offset)->result_array();
        return self::makeObjectsFromRows($rows, self::class);
    }

    public static function getAllRecipients() {
        $rows = self::getDb()->get('recipients')->result_array();
        return self::makeObjectsFromRows($rows, self::class);
    }

    public static function getRecipientById($id) {
        $row = self::getDb()->where('id', $id)->get('recipients')->row_array();
        return self::makeObjectFromRow($row, self::class);
    }

    public function insert() {
        $sql = "INSERT INTO recipients (first_name, last_name, email)
                VALUES (?, ?, ?)";

        $binds = array(
            $this->getFirstName(),
            $this->getLastName(),
            $this->getEmail()
        );

        $this->db->query($sql, $binds);
    }

    public function update() {
        $sql = "UPDATE recipients SET first_name = ?, last_name = ?, email = ? WHERE id = ?";
        $binds = array(
            $this->getFirstName(),
            $this->getLastName(),
            $this->getEmail(),
            $this->getId()
        );

        $this->db->query($sql, $binds);
    }

    public function delete() {
        $sql = "DELETE FROM recipients WHERE id = ?";
        $binds = array(
            $this->getId()
        );
        $this->db->query($sql, $binds);
    }

}