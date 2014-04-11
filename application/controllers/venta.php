<?php if (!defined('BASEPATH')) die();


class venta extends CI_Controller {

    
    var $dataPass; 
    
    public function __construct()
    {
       parent::__construct();
       $this->load->model("factura_model");
       $this->load->model("item_model");
       $this->load->model("employees_model");
       $this->load->model("suplidores_model");
       $this->dataPass = array();
       $this->dataPass["sideBar"] = "Esta seccion permite administrar todos los Distribuidores de agua castalia";
       $this->load->helper('url');
       $this->load->library('form_validation');
       $this->load->helper('form');
    }


   public function CxC(){
      $this->dataPass["employees"] = $this->factura_model->getCxC();
      $this->load->view("template/header",$this->dataPass);
      $this->load->view("views/venta/CxC");
      $this->load->view("template/footer");
   }
   
    public function CxP(){
      $this->dataPass["employees"] = $this->factura_model->getCxP();
      $this->load->view("template/header",$this->dataPass);
      $this->load->view("views/venta/CxP");
      $this->load->view("template/footer");
   }
   
   public function cobrar(){
         foreach ($this->input->post() as $k => $eso){           
             if($eso != null)
             $this->factura_model->abonarCxC($k,$eso);  
         }
         $this->CxC();
   }
   
   public function pagar(){
         foreach ($this->input->post() as $k => $eso){           
             if($eso != null)
             $this->factura_model->abonarCxP($k,$eso);  
         }
         $this->CxP();
   }
    
    
   
   public function ventaMostrador() {
      
       if($this->input->post()){
         $ventaObject = new stdClass();
         $arr = $this->input->post();
       
         $ventaObject->Descuento = $arr["Descuento"]."%";
         $ventaObject->ITBIS = $arr["ITBIS"]."%";
         $ventaObject->Total = $arr["Total"];
         $ventaObject->Tipo = "Contado";
         $ventaObject->Empleados_ID = $arr["employee"];
         unset($arr["Descuento"]);
         unset($arr["ITBIS"]);
         unset($arr["Total"]);
         unset($arr["employee"]);
         $idFactura = $this->factura_model->insertVentaMostrador($ventaObject);
         
         $arr2 = array();
         $counter = 0;
         foreach ($arr as $eso){
             $arr2[$counter] = $eso;
             $counter++;
         }
         
         for($i = 0; $i<sizeof($arr2); $i += 2 ){
             $this->item_model->useItems($arr2[$i],$arr2[$i+1]);
             $this->item_model->Factura_Articulo($idFactura, $arr2[$i], $arr2[$i+1]);
         }
         
         
        
         
             $this->dataPass['alert'] = 'VENTA REALIZADA';
            $this->dataPass["employees"] = $this->employees_model->getEmployees();
            $this->dataPass["items"] = $this->item_model->getInvenroty();
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/venta/venta_mostrador");
            $this->load->view("template/footer");
         
       }
       else{
            $this->dataPass["employees"] = $this->employees_model->getEmployees();
            $this->dataPass["items"] = $this->item_model->getInvenroty();
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/venta/venta_mostrador");
            $this->load->view("template/footer");
       }
       
   }
   
    public function compraSuplidor() {
      
       if($this->input->post()){
         $ventaObject = new stdClass();
         $arr = $this->input->post();
       
         $ventaObject->Descuento = $arr["Descuento"]."%";
         $ventaObject->ITBIS = $arr["ITBIS"]."%";
         $ventaObject->Total = $arr["Total"];
         $ventaObject->Tipo = $arr["Tipo"];
         $ventaObject->Empleados_ID = $arr["employee"];
         $ventaObject->enteID = $arr["enteID"];
         unset($arr["Descuento"]);
         unset($arr["ITBIS"]);
         unset($arr["Total"]);
         unset($arr["employee"]);
         unset($arr["enteID"]); 
         unset($arr["Tipo"]);
         
//         foreach ($arr as $pepe){
//             echo $pepe."<br>";
//         }
         $idFactura = $this->factura_model->insertCompraSuplidores($ventaObject);
         
         $arr2 = array();
         $counter = 0;
         foreach ($arr as $eso){
             $arr2[$counter] = $eso;
             $counter++;
         }
         
         for($i = 0; $i<sizeof($arr2); $i += 2 ){
             $this->item_model->addItems($arr2[$i],$arr2[$i+1]);
             $this->item_model->Factura_Articulo($idFactura, $arr2[$i], $arr2[$i+1]);
         }
         
          if($ventaObject->Tipo == "Credito"){
             
             $this->factura_model->insertCxP($idFactura,$ventaObject->Total);
         }
         $this->dataPass['alert'] = 'Realizada, revisar Articulos';
            $this->dataPass["employees1"] = $this->suplidores_model->getSuplidores();
            $this->dataPass["employees"] = $this->employees_model->getEmployees();
            $this->dataPass["items"] = $this->item_model->getInvenroty();
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/venta/compra_suplidor");
            $this->load->view("template/footer");
         
         
           

       }
       else{
            $this->dataPass["employees1"] = $this->suplidores_model->getSuplidores();
            $this->dataPass["employees"] = $this->employees_model->getEmployees();
            $this->dataPass["items"] = $this->item_model->getInvenroty();
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/venta/compra_suplidor");
            $this->load->view("template/footer");
       }
       
   }
    public function ventaDistribuidor() {
      
       if($this->input->post()){
         $ventaObject = new stdClass();
         $arr = $this->input->post();
       
         $ventaObject->Descuento = $arr["Descuento"]."%";
         $ventaObject->ITBIS = $arr["ITBIS"]."%";
         $ventaObject->Total = $arr["Total"];
         $ventaObject->Tipo = $arr["Tipo"];
         $ventaObject->Empleados_ID = $arr["employee"];
         $ventaObject->enteID = $arr["enteID"];
         unset($arr["Descuento"]);
         unset($arr["ITBIS"]);
         unset($arr["Total"]);
         unset($arr["employee"]);
         unset($arr["enteID"]);
         unset($arr["Tipo"]);
         
//         foreach ($arr as $pepe){
//             echo $pepe."<br>";
//         }
         $idFactura = $this->factura_model->insertVentaDistribuidores($ventaObject);
         
         $arr2 = array();
         $counter = 0;
         foreach ($arr as $eso){
             $arr2[$counter] = $eso;
             $counter++;
         }
         
         for($i = 0; $i<sizeof($arr2); $i += 2 ){
             $this->item_model->addItems($arr2[$i],$arr2[$i+1]);
             $this->item_model->Factura_Articulo($idFactura, $arr2[$i], $arr2[$i+1]);
         }
         
          if($ventaObject->Tipo == "Credito"){
             
             $this->factura_model->insertCxC($idFactura,$ventaObject->Total);
         }
         $this->dataPass['alert'] = 'Realizada, revisar Articulos';
            $this->dataPass["employees1"] = $this->employees_model->getDistribuidores();
            $this->dataPass["employees"] = $this->employees_model->getEmployees();
            $this->dataPass["items"] = $this->item_model->getInvenroty();
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/venta/venta_distribuidor");
            $this->load->view("template/footer");
         
         
           

       }
       else{
            $this->dataPass["employees1"] = $this->employees_model->getDistribuidores();
            $this->dataPass["employees"] = $this->employees_model->getEmployees();
            $this->dataPass["items"] = $this->item_model->getInvenroty();
            $this->load->view("template/header",$this->dataPass);
            $this->load->view("views/venta/venta_distribuidor");
            $this->load->view("template/footer");
       }
       
   }
  
   

}
