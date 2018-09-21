<?php
class Data_model extends CI_Model{
	
    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $date = new \Datetime('now');
        $GLOBALS['ComId']=1;
        $GLOBALS['UserId']=1;
        $GLOBALS['Now']=date('Y-m-d H:i:s',now());
        
    }
    
    // COMMON CODE START HERE  -- Written by William

    function GetAllRecord($tabName)
    {
        //data is retrive from this query
        $query = $this->db->get($tabName);
        return $query->result_array();
    }
    
    function GetSelectListById($id,$compare_id,$tabName)
    {
        $query = $this->db->get_where($tabName, array($compare_id => $id));
        return $query->result_array();
    }
	function GetAllActiveRecord($tabName)  
	{  
	   //data is retrive from this query  
	    $query = $this->db->get_where($tabName, array('Com_id'=>$GLOBALS['ComId'],'IsActive' => 1)); 
	    return $query->result_array();  
	} 
	function GetRecordById($id,$tabName)  
    { 
         $query = $this->db->get_where($tabName, array('ID' => $id,'IsActive' => 1)); 
         return $query->result_array();  
    }
    function GetRecordByForiegnKey($id,$fieldName,$tabName)
    {
        $query = $this->db->get_where($tabName, array($fieldName => $id,'IsActive' => 1));
        return $query->result_array();
    }    
    function RemoveRecordById($ArrIds,$tblName)
	{ 
		foreach ($ArrIds as $id)
		{ 	    
			$this->db->set('IsActive', 0);  //Set the column name and which value to set..
			$this->db->where('ID', $id); //set column_name and value in which row need to update
			$this->db->update($tblName); //Set your table name
		}
	}
	
	function UpdateRole($actionType,$role){
		$this->db->trans_begin();
		if($actionType=="0"){
			$data=array(
					'Com_id'=> $GLOBALS['ComId'],
					'Sl_no'=> 1,
					'Role'=> $role,
					'Added_on'=> $GLOBALS['Now'],
					'Added_by'=> $GLOBALS['UserId'],
					'IsActive'=> 1
			);
			$this->db->insert('role', $data);
			
			
		}else{
			$data=array(
					'Sl_no'=> 1,
					'Role'=> $role,
					'Modified_on'=> $GLOBALS['Now'],
					'Modified_by'=> $GLOBALS['UserId'],
					'IsActive'=> 1
			);
			$this->db->where('ID',$actionType);
			$this->db->update('role',$data);
		}
	
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return array('code' => 0);
		}else{
			$this->db->trans_commit();
			return array('code' => 1);
		}
		
	}
	

}
    