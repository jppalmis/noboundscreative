<?php
class Migration_login extends CI_Model {

    public $db;
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('nbcs2019', TRUE);
    }
    
    function InsertRequest($data)
    {
        $this->db->insert('tbl_frontend_request', $data);
    }

    function search_account_if_existing($data)
    {
        $statement = "select user_id, firstname, lastname, email, contact, avatar from tbl_users tu where tu.username like '".$data['username']."' and tu.password like '".$data['password']."' ";
        $execute_query = $this->db->query($statement);
        return $execute_query->result_array();
    }

    // function search_password_if_matches_username($data)
    // {
        // $statement = "select * from tbl_users tu where tu.username like ? and password like md5(?)";
        // $execute_query = $this->db->query($statement, array($data['username'], $data['password'] ));
        
        // $N = $execute_query->num_rows();
        // $R = $Q->result_array();
        
        // if ($N == 1) {
            
        //     foreach ($R as $val)
        //     {
        //         $arrSession = array(
        //             'uid' => $val["uid"],
        //             'pid' => $val["userPosition"],
        //             'branchID' => $val['branchID'],
        //             'uname' => $val["username"],
        //             'uposition' => $val["positionName"],
        //             'lvl'=> $val["positionLevel"],
        //             'processSteps' => $val['processSteps'],
        //             'accountType' => $val['accountType'],
        //         );
                
        //         $this->session->set_userdata($arrSession);
        //     }
        // }
        //echo 'andito:'.$this->session->userdata('uname');
    //     return $N;
    // }

    // function insertImage($data)
	// {
	// 	$this->db->insert('tbl_car_promo_images', $data);
    // }
    
    // function qEnablePromo($id)
    // {
    //     $sql = "update tbl_car_promo set status = 1 where promoID = ?";
    //     $Q = $this->db->query($sql, $id);
    // }

    // function qDisablePromo($id)
    // {
    //     $sql = "update tbl_car_promo set status = 0 where promoID = ?";
    //     $Q = $this->db->query($sql, $id);
    // }

    // function queryCarBrand()
    // {
    //     $sql = "select * from tbl_car_brand tcb where brandID in (select brandID from tbl_car_model group by brandID)";
    //     $Q = $this->db->query($sql);
    //     return $Q->result_array();
    // }
    
    // function queryCarModels($id)
    // {
    //     $sql = "select * from tbl_car_model where brandID = ?";
    //     $Q = $this->db->query($sql, $id);
    //     return $Q->result_array();
    // }

    // function queryCarModelsDetails($modelID)
	// {
	// 	$sql = "select * from tbl_car_model where modelID = ?";
	// 	$Q = $this->db->query($sql, $modelID);
	// 	return $Q->result_array();
	// }

    // function queryPromo()
    // {
    //     $sql = "select * from tbl_car_promo";
    //     $Q = $this->db->query($sql);
    //     return $Q->result_array();
    // }

    // function queryPromoDetails($id)
    // {
    //     $sql = "select * from tbl_car_promo where promoID = ?";
    //     $Q = $this->db->query($sql, $id);
    //     return $Q->result_array();
    // }

	
}        

/* End of file */


