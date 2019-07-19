<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
		$this->load->model('migration_dashboard', 'dashboard');
    }


	public function index()
	{
        if($this->session->userdata('user_id') != null) {
            $data['user_id'] = $this->session->userdata('user_id');
            $data['title'] = 'Control Panel - No Bounds Creative Services';
            $data['head_title'] = 'Dashboard';
            $this->load->view('wireframe/head');
            $this->load->view('wireframe/header');
            $this->load->view('wireframe/aside');
            $this->load->view('wireframe/dashboard_head', $data);
            // $this->load->view('view_dashboard', $data);
            $this->load->view('wireframe/dashboard_end');
		    $this->load->view('wireframe/footer');
		} else {
            $data['user_id'] = false;
            redirect(base_url(), 'refresh');
		}
		
    }
    
    

}