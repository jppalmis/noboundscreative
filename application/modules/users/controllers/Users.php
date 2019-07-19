<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$this->load->model('migration_users', 'users');
    }


	public function index()
	{
        if($this->session->userdata('user_id') != null) {
            $data['user_id'] = $this->session->userdata('user_id');
            $data['title'] = 'User Management - No Bounds Creative Services';
            $this->load->view('wireframe/head');
            $this->load->view('wireframe/header');
            $this->load->view('wireframe/aside');
            $this->load->view('wireframe/dashboard_head', $data);
            $this->load->view('view_users', $data);
            $this->load->view('wireframe/dashboard_end');
		    $this->load->view('wireframe/footer');
		} else {
            $data['user_id'] = false;
            redirect(base_url(), 'refresh');
		}
		
    }
    
    public function add_user()
	{
        if($this->session->userdata('user_id') != null) {

            $this->session->set_userdata('aside_nav', 'user_management');

            $data['user_id'] = $this->session->userdata('user_id');
            $data['title'] = 'User Management - No Bounds Creative Services';
            $data['head_title'] = 'User Management - Create User';
            $this->load->view('wireframe/head');
            $this->load->view('wireframe/header');
            $this->load->view('wireframe/aside');
            $this->load->view('wireframe/dashboard_head', $data);
            $this->load->view('view_add_user', $data);
            $this->load->view('wireframe/dashboard_end');
		    $this->load->view('wireframe/footer');
		} else {
            $data['user_id'] = false;
            redirect(base_url(), 'refresh');
		}
		
    }
    
    public function CreateUser()
	{
	    $this->output->enable_profiler(false);
        $this->form_validation->set_rules('inputFirstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('inputLastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('inputContactNumber', 'Contact Number', 'trim|required|numeric');
        $this->form_validation->set_rules('inputRole', 'Role', 'trim|required|numeric');
        $this->form_validation->set_rules('inputUsername', 'Username', 'trim|required');
		$this->form_validation->set_rules('inputPassword', 'Password', 'trim|required');
		$this->form_validation->set_rules('inputPasswordConfirm', 'Confirm Password', 'trim|required|matches[inputPassword]');
	    
	    $success = $this->form_validation->run($this);
	    
	    if ($success) {
	        $data['response'] = "false";
	        $data['errors'] = 'initiating...';

	        $idata = array(
                'username' => trim($this->input->post('inputUsername')),
                'password' => md5(trim($this->input->post('inputPasswordConfirm'))),
				'firstname' => trim($this->input->post('inputFirstname')),
				'lastname' => trim($this->input->post('inputLastname')),
				'email' => trim($this->input->post('inputEmail')),
                'contact' => trim($this->input->post('inputContactNumber')),
                'role' => trim($this->input->post('inputRole')),
	        );
	        
	        $this->users->CreateUsers($idata);
	        
	        $data['response'] = "true";
	        $data['message'] = 'User Created!';
	        
	    } else {
            $data['response'] = "false";
            $data['message'] = validation_errors();
	        // $data['message'] = $this->form_validation->error_array();
	    }
	    echo json_encode($data);
    }
    
    public function user_lists()
	{
        if($this->session->userdata('user_id') != null) {
            $config = array();
            $config['base_url'] = base_url('/users/user_lists/');
            $config['total_rows'] = $this->users->CountAllUsers();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config["full_tag_open"] = '<ul class="pagination pagination-sm no-margin pull-left">';
            $config["full_tag_close"] = '</ul>';	
            $config["first_link"] = "&laquo;";
            $config["first_tag_open"] = "<li>";
            $config["first_tag_close"] = "</li>";
            $config["last_link"] = "&raquo;";
            $config["last_tag_open"] = "<li>";
            $config["last_tag_close"] = "</li>";
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '<li>';
            $config['prev_link'] = '&lt;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '<li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
            $data["user_lists"] = $this->users->UserListsByPage($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $data['user_id'] = $this->session->userdata('user_id');
            $data['title'] = 'Control Panel - No Bounds Creative Services';
            $data['head_title'] = 'Users';

            // $data['request_lists'] = $this->request->RequestLists();

            $this->load->view('wireframe/head');
            $this->load->view('wireframe/header');
            $this->load->view('wireframe/aside');
            $this->load->view('wireframe/dashboard_head', $data);
            $this->load->view('view_lists_of_users', $data);
            $this->load->view('wireframe/dashboard_end');
		    $this->load->view('wireframe/footer');
		} else {
            $data['user_id'] = false;
            redirect(base_url(), 'refresh');
		}
		
    }

    public function ReadUser()
	{
        $this->form_validation->set_rules('userID', 'User ID', 'trim|required|numeric');
        if( trim($this->input->post('userID')) > 0 || !empty(trim($this->input->post('userID'))))
        {
            $data['UserDetails'] = $this->users->ReadUsers(trim($this->input->post('userID')));
            $data['response'] = 'true';
            $data['message'] = 'Read User Successful';
            $this->load->view('view_read_user', $data);
        } else {
            $data['response'] = 'false';
            $data['message'] = 'No User selected';
        }
        // echo json_encode($data);
    }

}