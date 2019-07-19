<?php
class Migration_request extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('nbcs2019', TRUE);
    }
    
    function InsertRequest($data)
    {
        $this->db->insert('tbl_frontend_request', $data);
    }

    function RequestLists()
    {
        $sql = "select * from tbl_frontend_request";
        $Q = $this->db->query($sql);
        return $Q->result_array();
    }

    function ReadRequests($id)
    {
        // $sql = "select * from tbl_frontend_request where id = ?";
        // $Q = $this->db->query($sql, $id);
        // return $Q->result_array();
        
        $query = $this->db->get_where('tbl_frontend_request', array('id' => $id));
        return $query->result_array();
    }

    function CountAllRequests() 
    {
        return $this->db->count_all("tbl_frontend_request");
    }

    function RequestListsByPage($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "asc");
        $query = $this->db->get("tbl_frontend_request");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function EditRequests($id, $data)
    {
        $this->db->set('business_name', $data['business_name']);
        $this->db->set('business_email', $data['business_email']);
        $this->db->set('what_do_they_do', $data['what_do_they_do']);
        $this->db->set('target_customers', $data['target_customers']);
        $this->db->set('product_services_reason', $data['product_services_reason']);
        $this->db->set('payment_method', $data['payment_method']);
        $this->db->set('help_needed', $data['help_needed']);
        $this->db->set('updated_at', $data['updated_at']);
        $this->db->where('id', $id);
        $this->db->update('tbl_frontend_request');
    }
 
    function DeleteRequests($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_frontend_request');
    }
	
}