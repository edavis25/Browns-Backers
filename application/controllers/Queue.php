<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queue extends CI_Controller {

    // Siteground mail limit = 80emails/15mins
    private $emailSendLimit = 80;
    private $emailTimeLimit = 900;    // 900 = 15mins in seconds

    // Email from info
    private $fromEmailAddress = 'brian@brownsbackerscolumbus.com';
    private $fromEmailName    = 'Brian Mez';

    public function __construct() {

        parent::__construct();

        // Make sure access is restricted to CLI only
        if(!$this->input->is_cli_request()) {
            exit('Not allowed.');
        }

        // Load models
        $this->load->model('Recipient_model');
        $this->load->model('Recipient_queue');

        // Load email library & set config
        $this->load->library('email');
        $config = array(
            'mailtype'  => 'html'
        );
        $this->email->initialize($config);
    }

    public function send() {
        $queued = Recipient_queue::getAll();

        // Loop counter to flag break when mail limit reached (80 emails/15 mins)
        $sentEmailCount = 0;

        foreach ($queued as $queue) {
            // Check initial queued time. If 15 mins hasn't elapsed, don't send email.
            if (time() - (int) $queue->getTimestamp() <= $this->emailTimeLimit) {
                continue;
            }

            // Check mail limit flag and break loop if limit exceeded
            if ($sentEmailCount > $this->emailSendLimit) {
                break;
            }

            // Send email
            $recipient = Recipient_model::getRecipientById($queue->getRecipientId());

            $this->email->from($this->fromEmailAddress, $this->fromEmailName);
            $this->email->to($recipient->getEmail());
            $this->email->subject($queue->getEmailSubject());
            $this->email->message($queue->getEmailBody());
            $this->email->send();

            $sentEmailCount += 1;       // Increment email limit counter

            // Delete queued task from DB after sending email
            $queue->delete();
        }
    }

    public function test() {
        echo 'Test';
    }

}