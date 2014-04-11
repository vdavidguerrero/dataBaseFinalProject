<?php if (!defined('BASEPATH')) die();


class reports extends CI_Controller {

    
    var $dataPass; 
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model("employees_model");
       $this->load->model("factura_model");
       $this->dataPass = array();
       $this->dataPass["sideBar"] = "Esta seccion permite administrar todos los Distribuidores de agua castalia";
       $this->load->helper('url');
       $this->load->library('form_validation');
       $this->load->helper('form');
    }


    public function ventas(){
       
       $this->dataPass["facturas"] = $this->factura_model->getFacturas();
       $this->dataPass["facturas2"] = $this->factura_model->getFacturas2();
       $this->load->view("template/header",$this->dataPass);
       $this->load->view("views/reports/ventas",$this->dataPass);
       $this->load->view("template/footer");
   }
   
  public function CxC(){
      $this->dataPass["employees"] = $this->factura_model->getCxC();
      $this->load->view("template/header",$this->dataPass);
      $this->load->view("views/reports/CxC");
      $this->load->view("template/footer");
   }
   
    public function CxP(){
      $this->dataPass["employees"] = $this->factura_model->getCxP();
      $this->load->view("template/header",$this->dataPass);
      $this->load->view("views/reports/CxP");
      $this->load->view("template/footer");
   }
   
}
