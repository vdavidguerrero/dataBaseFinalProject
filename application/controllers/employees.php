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
    }


    public function showEmployees(){
       
       $employeeObject = $this->employees_model->getEmployees();
       $this->dataPass["employees"] = $employeeObject;
       $this->load->view("template/header",$this->dataPass);
       $this->load->view("views/show_employees",$this->dataPass);
       $this->load->view("template/footer");
      
   }
   
   public function editEmployees() {
       
       if(!$this->input->post()){
           
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/create_employees",$this->dataPass);
            $this->load->view("template/footer");
           
       }
       else{
           
           
       }
       
   }
   

}
