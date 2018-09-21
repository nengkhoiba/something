<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_controller extends CI_Controller {
	
	function __construct()
    {
    	parent::__construct();
    	$this->load->model('Data_model', 'database');
    	$this->load->library ( 'form_validation' );
    	$this->load->helper ( 'security' );
    	
    }
	

// 	COMMON REMOVE ITEM START HERE -- Written by William
	public function Remove()
	{
	    
	    try {
	        $IdsArray = json_decode($this->input->post('dataArr',true), TRUE);
	        $tableName = $this->input->post('table',true);
	        $this->database->RemoveRecordById($IdsArray,$tableName);
	        $output = array('success' =>true, 'msg'=> "Deleted sucessfull");
	        
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	}
	// 	COMMON REMOVE ITEM END HERE -- Written by William
	
// 	LOAD DROP DOWN DATA SECTION START HERE -- Written by William
	public function loadDropDown()
	{
	    try {
	        $tblName =  $this->input->post('tblName',true);
	        $selectedVal =  $this->input->post('selectedVal',true);
	        $data['result']=$this->database->GetAllActiveRecord($tblName);
	        $data['selectedVal']=$selectedVal;
	        $output = array(
	            'html'=>$this->load->view('datafragment/dropDown/Select_optionList',$data, true),
	            'success' =>true
	        );
	    } catch (Exception $ex) {
	        $output = array(
	            'msg'=> $ex->getMessage(),
	            'success' => false
	        );
	    }
	    echo json_encode($output);
	    
	}
	
	public function UpdateRole()
	{
		
		$_POST = json_decode(trim(file_get_contents('php://input')), true);
		try {
			$role =  $this->input->post('txtRole',true);
			$ActionType =  $this->input->post('ActionType',true);
			
			if($role == ''){
				$output = array(
						'msg'=> 'Wait something hmm..',
						'success' =>false
				);
				
			}else{
				$result=$this->database->UpdateRole($ActionType,$role);
				if($result['code'] == 1)
				{
					$data['result']=$this->database->GetAllActiveRecord('role');
					$output = array(
							'html'=>$this->load->view('data_fragment/Role_table',$data, true),
							'msg'=>'Updated successfully!',
							'success' =>true
					);
				}else{
					$output = array(
							'msg'=>'Something went wrong!',
							'success' =>false
					);
				}
				
			}
		} catch (Exception $ex) {
			$output = array(
					'msg'=> $ex->getMessage(),
					'success' => false
			);
			
		}
		echo json_encode($output);
	}
	public function LoadRole()
	{
		try {
				$data['result']=$this->database->GetAllActiveRecord('role');
				
					$output = array(
							'html'=>$this->load->view('data_fragment/Role_table',$data, true),
							'success' =>true
					);
		} catch (Exception $ex) {
			$output = array(
					'msg'=> $ex->getMessage(),
					'success' => false
			);
				
		}
		echo json_encode($output);
	}
	
}
