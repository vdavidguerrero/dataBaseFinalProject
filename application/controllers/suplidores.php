<?php if (!defined('BASEPATH')) die();


class suplidores extends CI_Controller {

    
    var $dataPass; 
    
    public function __construct()
    {   
        parent::__construct();
        $this->load->model("suplidores_model");
        $this->dataPass = array();
        $this->dataPass["sideBar"] = "Seccion del inventario, para crear articulos y ver articulos";
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }
    
     public function showSuplidores(){
       
       $suplidorObject = $this->suplidores_model->getSuplidores();
       $this->dataPass["suplidores"] = $suplidorObject;
       $this->load->view("template/header",$this->dataPass);
       $this->load->view("views/suplidores/show_suplidores",$this->dataPass);
       $this->load->view("template/footer");
   }
   
   public function createSuplidor() {
       
       if($this->input->post()){
           $suplidorObject = new stdClass(); 
           foreach($this->input->post() as $k => $pepe){
              $suplidorObject->$k = $pepe;
           }
           $this->suplidores_model->insertSuplidor($suplidorObject);
           $this->showSuplidores(); 
       }
       else{
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/suplidores/create_suplidor");
            $this->load->view("template/footer");
       }   
   }
    
   public function deleteSuplidor($id){
       
       $this->suplidores_model->deleteSuplidor($id);
       $this->showSuplidores();
   }
    
    
    
    
    
    
    
}
