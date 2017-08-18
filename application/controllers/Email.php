<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
        // Load recipients model and get recipients
        $this->load->model('Recipient_model');
        $recipients = Recipient_model::getTestRecipients();

        // Send emails
        foreach ($recipients as $recipient) {
            $this->email->from($this->fromEmailAddress, $this->fromEmailName);
            $this->email->to($recipient->getEmail());
            $this->email->subject($this->input->post('subject'));
            $this->email->message($this->input->post('body'));
            $this->email->send();
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