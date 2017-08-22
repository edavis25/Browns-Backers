<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    // Siteground mail limit = 80emails/15mins
    private $emailSendLimit = 80;

    // Email from info
    private $fromEmailAddress = 'brian@brownsbackerscolumbus.com';
    private $fromEmailName    = 'Brian Mez';

    public function __construct() {
        parent::__construct();
        ensureLoggedIn();

        // Load email library and set config
        $this->load->library('email');
        $config = array(
            'mailtype'  => 'html'
        );
        $this->email->initialize($config);
    }

    public function index() {
        $this->load->view('email_editor');
    }

    public function send() {
        // Load models and get recipients
        $this->load->model('Recipient_model');
        $this->load->model('Recipient_queue');
        $recipients = Recipient_model::getAllRecipients();

        // Sent email counter flag to queue emails exceeding the host's limit (80 emails/15 mins)
        $sentEmailCount = 0;

        // Send emails
        foreach ($recipients as $recipient) {
            // If limit not reached, send email
            if ($sentEmailCount < $this->emailSendLimit) {
                $this->email->from($this->fromEmailAddress, $this->fromEmailName);
                $this->email->to($recipient->getEmail());
                $this->email->subject($this->input->post('subject'));
                $this->email->message($this->input->post('body'));
                $this->email->send();
            }
            else {
                // Else queue the emails in DB for cron job sending
                $queued = new Recipient_queue(array(
                    'recipient_id'  => $recipient->getId(),
                    'email_body'    => $this->input->post('body'),
                    'email_subject' => $this->input->post('subject'),
                    'timestamp'     => time()
                ));

                $queued->insert();
            }

            $sentEmailCount += 1;
        }

        // Set flashdata
        $this->session->set_flashdata('type',    'success');
        $this->session->set_flashdata('message', 'Your emails have been sent!');

        // Redirect back to admin page
        redirect(base_url('admin/tools'));
    }

    public function send_tests() {
        $this->load->model('Recipient_model');
        $recipients = Recipient_model::getTestRecipients();

        // Begin building string for flashdata message
        $flashMessage = '<b>Emails have been sent to the following addresses:</b> <br>';

        foreach ($recipients as $recipient) {
            // Send emails
            $this->email->from($this->fromEmailAddress, $this->fromEmailName);
            $this->email->to($recipient->getEmail());
            $this->email->subject($this->input->post('subject'));
            $this->email->message($this->input->post('body'));
            $this->email->send();

            // Add email address to flashdata message
            $flashMessage .= $recipient->getEmail() . '<br>';
        }

        // Set flashdata
        $this->session->set_flashdata('type',    'success');
        $this->session->set_flashdata('message', $flashMessage);

        // Send data back to the email editor form
        $data = array(
            'subject' => $this->input->post('subject'),
            'body'    => $this->input->post('body')
        );
        $this->load->view('email_editor', $data);
    }

}