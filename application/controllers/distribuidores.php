<?php if (!defined('BASEPATH')) die();


class distribuidores extends CI_Controller {

    
    var $dataPass; 
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model("employees_model");
       $this->dataPass = array();
       $this->dataPass["sideBar"] = "Esta seccion permite administrar todos los Distribuidores de agua castalia";
       $this->load->helper('url');
       $this->load->library('form_validation');
       $this->load->helper('form');
    }


    public function showDistribuidores(){
       
       $employeeObject = $this->employees_model->getDistribuidores();
       $this->dataPass["distribuidores"] = $employeeObject;
       $this->load->view("template/header",$this->dataPass);
       $this->load->view("views/employee/show_distribuidores",$this->dataPass);
       $this->load->view("template/footer");
      
   }
   
   public function CreateDistribuidor() {
      
       if($this->input->post()){
           $employeeObject = new stdClass(); 
           foreach($this->input->post() as $k => $pepe){
              $employeeObject->$k = $pepe;
           }
           $this->employees_model->insertDistribuidores($employeeObject);
           $this->showDistribuidores();
       }
       else{
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/employee/create_distribuidor");
            $this->load->view("template/footer");
       }
       
   }
   
   public function editDistribuidor($cedula) {
       
        $employeeObjec2 = $this->employees_model->getEmployee($cedula);
        $this->dataPass["employee"] = $employeeObjec2;
        $this->load->view("template/header",$this->dataPass);
        $this->load->view("views/employee/show_employee",$this->dataPass);
        $this->load->view("template/footer"); 
   }
   
   public function deleteDistribuidor($cedula){
       $this->employees_model->deleteDistribuidor($cedula);
       $this->showDistribuidores();
   }
   

}
