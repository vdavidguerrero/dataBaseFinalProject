<?php if (!defined('BASEPATH')) die();


class production extends CI_Controller {
    
    var $dataPass; 
    
    public function __construct()
    {   
        parent::__construct();
        $this->load->model("production_model");
        $this->load->model("employees_model");
        $this->load->model("item_model");
        
        $this->dataPass = array();
        $this->dataPass["sideBar"] = "Seccion para agregar botellas de aguas al inventario";
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }
    
   
   public function makeBash() {
       
       
       if($this->input->post()){
          $product =  $this->input->post("product");
          $qty = $this->input->post("qty");
          $employees = $this->input->post("employee");
         
         //  $this->production_model->inse($itemObject);
           $itemList = array();
           $itemList2 = array();
           $itemList[0] = $this->item_model->getItem("Botella".$product)->ID;
           $itemList[1] = $this->item_model->getItem("Etiqueta".$product)->ID;
           $itemList[2] = $this->item_model->getItem("Tapa".$product)->ID;
           $itemList[3] = $this->item_model->getItem("Quimico1".$product)->ID;
           $itemList[4] = $this->item_model->getItem("Quimico2".$product)->ID;
           $itemList[5] = $this->item_model->getItem("Quimico3".$product)->ID;
           $itemList2[0] = $this->item_model->getItem("Redecilla")->ID;
           $itemList2[1] = $this->item_model->getItem("Guantes")->ID;
         
           $temp = true;
           
           foreach($itemList as $id){
                    if (!$this->item_model->checkQty($id,$qty)){
                        $temp = false;   
                    } 
                }
 
           if($temp){
                $this->production_model->insertBash($qty,$employees);
                foreach($itemList as $item){
                    $this->item_model->useItems($item,$qty);
                }
                foreach($itemList2 as $item){
                    $this->item_model->useItems($item,1);
                }
                
                 $item = $this->item_model->getItem("Botellas".$product."_Terminadas")->ID;
                 $this->item_model->addItems($item, $qty);
                    $this->dataPass["alert"] = "PRODUCCION LISTA"; 
           }
           else{
               $this->dataPass["alert"] = "Faltan Productos para la produccion";
           }
               
           $this->dataPass["employees"] = $this->employees_model->getEmployees();
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/production/make_bash");
            $this->load->view("template/footer");
       }
       else{
            $this->dataPass["employees"] = $this->employees_model->getEmployees();
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/production/make_bash");
            $this->load->view("template/footer");
       }
       
   }
   
   
    
    
    
    
    
}
