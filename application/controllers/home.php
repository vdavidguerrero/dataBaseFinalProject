<?php if (!defined('BASEPATH')) die();


class home extends CI_Controller {
    
    var $dataPass;
    
    public function __construct(){
       parent::__construct();
      $this->load->helper('url');
      $this->dataPass = array();
      $this->dataPass["sideBar"] = "Esta seccion permite administrar todos los empleados de la compania";
    }

   public function  index(){

       $this->load->view("template/header",$this->dataPass);
       $this->load->view("template/footer");
   }

}
