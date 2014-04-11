<?php if (!defined('BASEPATH')) die();


class item extends CI_Controller {

    
    var $dataPass; 
    
    public function __construct()
    {   
        parent::__construct();
        $this->load->model("item_model");
        $this->dataPass = array();
        $this->dataPass["sideBar"] = "Seccion del inventario, para crear articulos y ver articulos";
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }
    
     public function showInventory(){
       
       $itemObject = $this->item_model->getInvenroty();
       $this->dataPass["inventory"] = $itemObject;
       $this->load->view("template/header",$this->dataPass);
       $this->load->view("views/item/show_inventory",$this->dataPass);
       $this->load->view("template/footer");
   }
   
   public function CreateItem() {
       
       if($this->input->post()){
           $itemObject = new stdClass(); 
           foreach($this->input->post() as $k => $pepe){
              $itemObject->$k = $pepe;
           }
           $this->item_model->insertItem($itemObject);
           $this->showInventory(); 
       }
       else{
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/item/create_Item");
            $this->load->view("template/footer");
       }
       
   }
   
   public function editQty() {
       $editList = $this->input->post();
       foreach($editList as $k => $pepe)
       {
           if($pepe){
               $this->item_model->editItem($k, $pepe);
           }
       }
       $this->showInventory();
    $this->load->view("template/footer"); 
   }
   
   public function deleteItem($id){
       
       $this->item_model->deleteItem($id);
       $this->showInventory();
   }
    
    
    
    
    
    
    
}
