<?php 
	class Employee extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Employee_m');
		}

		public function index(){
			$this->load->view('layouts/header');
			$this->load->view('employee/index');
			$this->load->view('layouts/footer');
		}

		public function all_employee(){
			$result = $this->Employee_m->all_employee();
			echo json_encode($result);
		}

		public function add_employee(){
			$result = $this->Employee_m->add_employee();
			if($result){
				echo "1";
			}else{
				echo '2';
			}

		}

		public function delete_employee(){
			$result = $this->Employee_m->delete_employee();
			if($result){
				echo '1';
			}else{
				echo '2';
			}
		}
		public function edit_Employee(){
			$result = $this->Employee_m->edit_employee();
			echo json_encode($result);
		}
		public function update_Employee(){
			$result = $this->Employee_m->update_employee();
			
		}
	}
 ?>
