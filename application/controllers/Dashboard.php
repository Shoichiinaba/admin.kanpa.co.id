<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    var $template = 'template/index';
    public function __construct()
    {
        parent::__construct();
        $this->API = "https://admin.kanpa.co.id/Api/properti_get";
    }

    public function index()
    {
        $data['tittle']         = 'kanpa.co.id | Dashboard';
        $data['content']        = 'page_admin/dashboard/dashboard';
        $data['script']         = 'page_admin/dashboard/dashboard_js';
        $this->load->view($this->template, $data);
    }
}