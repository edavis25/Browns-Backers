<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        ensureLoggedIn();
        $this->load->model('Recipient_model');
    }

    // Index redirect to tools function (workaround for pagination issues)
    public function index() {
        redirect(base_url('admin/tools'));
    }

    // Display admin tools view
    public function tools($offset = 0) {

        $this->load->model('Recipient_queue');
        $recipient = $this->Recipient_model->getRecipientById(1);
        $que = new Recipient_queue(array(
           'email_body' => 'body',
           'email_subject' => 'subject',
           'recipient_id' => $recipient->getId()
        ));
        dd($que);


        $this->load->library('pagination');

        // Setup pagination config to use Bootstrap class stylings
        $config = array(
            // Basic pagination config
            'base_url'        => base_url('admin/tools'),
            'total_rows'      => $this->Recipient_model->getRecipientsCount(),
            'per_page'        => 20,
            // Config for Bootstrap styles
            'full_tag_open'   => '<ul class="pagination">',
            'full_tag_close'  => '</ul>',
            'num_tag_open'    => '<li>',
            'num_tag_close'   => '</li>',
            'cur_tag_open'    => '<li class="disabled"><li class="active"><a href="###">',
            'cur_tag_close'   => '</a></li>',
            'next_tag_open'   => '<li>',
            'next_tag_close'  => '</li>',
            'prev_tag_open'   => '<li>',
            'prev_tag_close'  => '</li>',
            'first_tag_open'  => '<li>',
            'first_tag_close' => '</li>',
            'last_tag_open'   => '<li>',
            'last_tag_close'  => '</li>',
            // Add url anchor to stop page scroll on refresh
            'suffix'          => '#recipients-table',
            'first_url'       => base_url('admin/tools' . '#recipients-table')
        );
        $this->pagination->initialize($config);

        $data = array(
            'recipients'      => Recipient_model::getPaginatedRecipients($config['per_page'], $offset),
            'paginationLinks' => $this->pagination->create_links()
        );

        $this->load->view('admin', $data);
    }
}