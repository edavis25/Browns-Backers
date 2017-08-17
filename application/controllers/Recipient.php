<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipient extends CI_Controller {

    public function __construct() {
        parent::__construct();
        ensureLoggedIn();
        $this->load->model('Recipient_model');
    }

    // Add a new recipient or update existing recipient on mailing list
    public function add_or_update() {
        // Create user object w/ post data
        $recipient = new Recipient_model($this->input->post());
        // Concat recipient first/last names for flash data
        $recipName = $recipient->getFirstName() . ' ' . $recipient->getLastName();

        // If recipient already has an id, they exist so an update is called (else: create new)
        if ($recipient->getId()) {
            $recipient->update();
            $this->session->set_flashdata('type',    'success');
            $this->session->set_flashdata('message', "Recipient: <b>$recipName</b> information updated");
        }
        else {
            $recipient->insert();
            $this->session->set_flashdata('type',    'success');
            $this->session->set_flashdata('message', 'New recipient added to mailing list!');
        }

        redirect('admin/tools');
    }

    // Return edit recipient form w/ existing info (called by AJAX)
    public function edit() {
        $data = array(
            'recipient' => Recipient_model::getRecipientById($this->input->get('recipient-id'))
        );
        $this->load->view('includes/add_edit_recipient_form', $data);
    }

    public function delete() {
        $recipient = Recipient_model::getRecipientById($this->input->post('delete-id'));
        $recipName = $recipient->getFirstName() . ' ' . $recipient->getLastName();
        $recipient->delete();

        $this->session->set_flashdata('type',    'danger');
        $this->session->set_flashdata('message', "Recipient: <b>$recipName</b> deleted from mailing list!");

        redirect(base_url('admin/tools'));
    }
}