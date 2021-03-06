<?php if (!defined('BASEPATH')) die();


class employees extends CI_Controller {

    
    var $dataPass; 
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model("employees_model");
       $this->dataPass = array();
       $this->dataPass["sideBar"] = "Esta seccion permite administrar todos los empleados de la compania";
       $this->load->helper('url');
       $this->load->library('form_validation');
       $this->load->helper('form');
    }


    public function showEmployees(){
       
       $employeeObject = $this->employees_model->getEmployees();
       $this->dataPass["employees"] = $employeeObject;
       $this->load->view("template/header",$this->dataPass);
       $this->load->view("views/employee/show_employees",$this->dataPass);
       $this->load->view("template/footer");
      
   }
   
   public function CreateEmployee() {
       
       
       if($this->input->post()){
           $employeeObject = new stdClass(); 
           foreach($this->input->post() as $k => $pepe){
              $employeeObject->$k = $pepe;
           }
           $this->employees_model->insertEmployee($employeeObject);
           $this->showEmployees();
       }
       else{
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/employee/create_employee");
            $this->load->view("template/footer");
       }
       
   }
   
   public function editEmployee($cedula) {
       
        $employeeObjec2 = $this->employees_model->getEmployee($cedula);
        $this->dataPass["employee"] = $employeeObjec2;
        $this->load->view("template/header",$this->dataPass);
        $this->load->view("views/employee/show_employee",$this->dataPass);
        $this->load->view("template/footer"); 
   }
   
   public function deleteEmployee($cedula){
       $this->employees_model->deleteEmployee($cedula);
       $this->showEmployees();
   }
   

}
