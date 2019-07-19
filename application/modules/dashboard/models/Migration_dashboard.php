<?php
class Migration_dashboard extends CI_Model {

    // public $db;
    // function __construct()
    // {
    //     parent::__construct();
    //     $this->db = $this->load->database('db', TRUE);
    // }
    
    function InsertRequest($data)
    {
        $this->load->database();
        $this->db->insert('tbl_frontend_request', $data);
    }



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


