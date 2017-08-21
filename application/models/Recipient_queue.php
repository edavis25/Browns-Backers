<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipient_queue extends Model {

    protected $recipientId;
    protected $emailBody;
    protected $emailSubject;
    protected $timestamp;

    public function __construct($properties = array()) {

        parent::__construct(safeGet($properties, 'id', null));

        $this->recipientId  = safeGet($properties, 'recipient_id', null);
        $this->emailBody    = safeGet($properties, 'email_body', null, false);
        $this->emailSubject = safeGet($properties, 'email_subject', null);
        $this->timestamp    = safeGet($properties, 'timestamp', null);
    }

    public static function getAll() {
        $rows = self::getDb()->get('recipient_queue')->result_array();
        return self::makeObjectsFromRows($rows, self::class);
    }
    public static function getById($id) {
        $row = self::getDb()->where('id', $id)->get('recipient_queue')->row_array();
        return self::makeObjectFromRow($row, self::class);
    }
    public static function getByRecipientId($recipientId) {
        $row = self::getDb()->where('recipient_id', $recipientId)->get('recipient_queue')->row_array();
        return self::makeObjectFromRow($row, self::class);
    }

    public function getRecipientId() {
        return $this->recipientId;
    }
    public function setRecipientId($id) {
        $this->recipientId = $id;
    }
    public function getEmailBody() {
        return $this->emailBody;
    }
    public function setEmailBody($body) {
        $this->emailBody = $body;
    }
    public function getEmailSubject() {
        return $this->emailSubject;
    }
    public function setEmailSubject($subject) {
        $this->emailSubject = $subject;
    }
    public function getTimestamp() {
        return $this->timestamp;
    }
    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function insert() {
        $data = array(
            'recipient_id'  => $this->recipientId,
            'email_body'    => $this->emailBody,
            'email_subject' => $this->emailSubject,
            'timestamp'     => $this->timestamp()
        );

        $this->db->insert('recipient_queue', $data);
    }

    public function update() {
        $sql = "UPDATE recipient_queue SET recipient_id = ?, email_body = ?, email_subject = ?, timestamp = ? WHERE id = ?";
        $binds = array(
            $this->recipientId,
            $this->emailBody,
            $this->emailSubject,
            $this->timestamp,
            $this->getId()
        );

        $this->db->query($sql, $binds);
    }

    public function delete() {
        $this->db->where('id', $this->getId());
        $this->db->delete('recipient_queue');
    }

}