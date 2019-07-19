<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller {

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
		$this->load->model('migration_request', 'request');
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
            // $this->load->view('view_request', $data);
            $this->load->view('wireframe/dashboard_end');
		    $this->load->view('wireframe/footer');
		} else {
            $data['user_id'] = false;
            redirect(base_url(), 'refresh');
		}
		
    }

    public function request_lists()
	{
        if($this->session->userdata('user_id') != null) {
            $config = array();
            $config['base_url'] = base_url('/requests/request_lists/');
            $config['total_rows'] = $this->request->CountAllRequests();
            $config['per_page'] = 5;
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
            $data["request_lists"] = $this->request->RequestListsByPage($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();

            $data['user_id'] = $this->session->userdata('user_id');
            $data['title'] = 'Control Panel - No Bounds Creative Services';
            $data['head_title'] = 'Requests';

            // $data['request_lists'] = $this->request->RequestLists();

            $this->load->view('wireframe/head');
            $this->load->view('wireframe/header');
            $this->load->view('wireframe/aside');
            $this->load->view('wireframe/dashboard_head', $data);
            $this->load->view('view_request', $data);
            $this->load->view('wireframe/dashboard_end');
		    $this->load->view('wireframe/footer');
		} else {
            $data['user_id'] = false;
            redirect(base_url(), 'refresh');
		}
		
    }
    

    public function ReadRequest()
	{
        $this->form_validation->set_rules('requestID', 'Request ID', 'trim|required|numeric');
        if( trim($this->input->post('requestID')) > 0 || !empty(trim($this->input->post('requestID'))))
        {
            $data['RequestDetails'] = $this->request->ReadRequests(trim($this->input->post('requestID')));
            $data['response'] = 'true';
            $data['message'] = 'Read Request Successful';
            $this->load->view('view_read_request', $data);
        } else {
            $data['response'] = 'false';
            $data['message'] = 'No Request selected';
        }
        // echo json_encode($data);
    }

    public function ReadRequestForEditing()
	{
        $this->form_validation->set_rules('requestID', 'Request ID', 'trim|required|numeric');
        if( trim($this->input->post('requestID')) > 0 || !empty(trim($this->input->post('requestID'))))
        {
            $data['RequestDetails'] = $this->request->ReadRequests(trim($this->input->post('requestID')));
            $data['response'] = 'true';
            $data['message'] = 'Read Request Successful';
            $this->load->view('view_edit_request', $data);
        } else {
            $data['response'] = 'false';
            $data['message'] = 'No Request selected for editing';
        }
        // echo json_encode($data);
    }

    public function EditRequest()
	{
        $this->form_validation->set_rules('requestID', 'Request ID', 'trim|required|numeric');
        if( trim($this->input->post('requestID')) > 0 || !empty(trim($this->input->post('requestID'))))
        {
            $date = new DateTime();

            $updateData = array(
                'business_name' => trim($this->input->post('inputBusinessName')),
                'business_email' => trim($this->input->post('inputBusinessEmail')),
                'what_do_they_do' => trim($this->input->post('textareaWhatDoYouDo')),
                'target_customers' => trim($this->input->post('inputTargetCustomers')),
                'product_services_reason' => trim($this->input->post('textareaProductServices')),
                'payment_method' => trim($this->input->post('inputPaymentMethod')),
                'help_needed' => trim($this->input->post('inputHelpNeeded')),
                'updated_at' => $date->format('Y-m-d H:i:s'),
            );
            
            $this->request->EditRequests($this->input->post('requestID'), $updateData);
            
            $data['response'] = "true";
            $data['message'] = 'Edit Request Successful!';
        } else {
            $data['response'] = 'false';
            $data['message'] = 'No Request selected for editing';
        }   
	    // echo json_encode($data);
	}
    
    public function DeleteRequest()
	{
        $this->form_validation->set_rules('requestID', 'Request ID', 'trim|required|numeric');
        if( trim($this->input->post('requestID')) > 0 || !empty(trim($this->input->post('requestID'))))
        {
            $data['RequestDetails'] = $this->request->DeleteRequests(trim($this->input->post('requestID')));
            $data['response'] = 'true';
            $data['message'] = 'Delete Request Successful';
            $this->load->view('view_read_request', $data);
        } else {
            $data['response'] = 'false';
            $data['message'] = 'No Request Deleted';
        }
        // echo json_encode($data);
    }

}