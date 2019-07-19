<?php
class Migration_users extends CI_Model {

    public $db;
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('nbcs2019', TRUE);
    }
    
    function InsertRequests($data)
    {
        $this->load->database();
        $this->db->insert('tbl_frontend_request', $data);
    }

    function CreateUsers($data)
    {
        $this->load->database();
        $this->db->insert('tbl_users', $data);
    }

    function CountAllUsers() 
    {
        return $this->db->count_all("tbl_users");
    }

    function UserListsByPage($limit, $start) 
    {
        $this->db->join('tbl_user_roles', 'tbl_user_roles.role_id = tbl_users.role');
        $this->db->limit($limit, $start);
        $this->db->order_by("user_id", "asc");
        $query = $this->db->get("tbl_users");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function ReadUsers($user_id)
    {
        $this->db->join('tbl_user_roles', 'tbl_user_roles.role_id = tbl_users.role');
        $query = $this->db->get_where('tbl_users', array('user_id' => $user_id));
        return $query->result_array();
    }

	
}

