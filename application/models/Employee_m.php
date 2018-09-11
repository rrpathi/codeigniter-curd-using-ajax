<?php 
	class Employee_m extends CI_Model{
		public function all_employee(){
			$employees_list = $this->db->get('employees');
			if($employees_list->num_rows()>0){
				return $employees_list->result();
				
			}else{
				return  "";
			}
		}
		public function add_employee(){
			$insert_array = array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'phone_number'=>$this->input->post('phone'),
				'address'=>$this->input->post('address')
			);
			if($this->db->insert('employees',$insert_array)){
				return 	"true";
			}else{
				return "false";
			}
		}

		public function delete_employee(){
			$id =$this->input->post('employee_id');
			$this->db->where('id',$id)->delete('employees');
		}
		public function edit_employee($value=''){
			$id =$this->input->post('employee_id');
			return $edit_data =$this->db->where('id',$id)->get('employees')->result_array()['0'];
		}

		public function update_employee(){
			$id =$this->input->post('id');
			$update_array = array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'phone_number'=>$this->input->post('phone'),
				'address'=>$this->input->post('address')
			);
			return $this->db->where('id',$id)->update('employees',$update_array);
		}


	}

 ?>
