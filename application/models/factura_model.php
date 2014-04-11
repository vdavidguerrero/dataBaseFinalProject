<?php

class factura_model extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    
        
    }
    
    
    public function getCxP(){
          $sendingQuery = "
        select * from Cuentas_Por_Pagar
             ";
              return $query = $this->db->query($sendingQuery)->result();
    }
    
    
    public function insertCxC($facturaID, $monto){
        
                $sendingQuery = "
         INSERT INTO [dbo].[Cuentas_Por_Cobrar]
           ([Facturas_Distribuidores]
           ,[Monto_Pendiente])
     VALUES
           ($facturaID,
           $monto)
        ";
                 $query = $this->db->query($sendingQuery);
    }
    
     public function insertCxP($facturaID, $monto){
                 $sendingQuery = "
                 INSERT INTO [dbo].[Cuentas_Por_Pagar]
                  ([Facturas_Suplidores]
                  ,[Monto_Pendiente])
                 VALUES
                  ($facturaID,
                  $monto)
        ";
                 $query = $this->db->query($sendingQuery);
    }
    
    public function insertVentaMostrador($facturaObject){
       
        $id = $this->insertFactura($facturaObject);
        
        $sendingQuery = "
         INSERT INTO [dbo].[Ventas_Mostrador]
           ([Facturas_ID]
           ,[Fecha])
        VALUES
           ($id
           ,GETDATE())
        ";
        $query = $this->db->query($sendingQuery);
        return $id;
    }
    
     public function insertVentaDistribuidores($facturaObject){
       
        $id = $this->insertFactura($facturaObject,1);
        
        $sendingQuery = "
         INSERT INTO [dbo].[Ventas_Distribuidor]
           ([Facturas_Distribuidores_ID]
           ,[Fecha])
        VALUES
           ($id
           ,GETDATE())
        ";
        $query = $this->db->query($sendingQuery);
        return $id;
    }
    
    public function insertCompraSuplidores($facturaObject){
         $id = $this->insertFactura($facturaObject,0);
        
        $sendingQuery = "
         INSERT INTO [dbo].[Compras_Suplidores]
           ([Facturas_Suplidores_ID]
           ,[Fecha])
        VALUES
           ($id
           ,GETDATE())
        ";
        $query = $this->db->query($sendingQuery);
        return $id;
    }
    
    
    
    public function getFactura($facturaID)
    {
        $sendingQuery = "
        SELECT *
        FROM Facturas
        where ID = $facturaID
        ";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        return $object; 
    }

    public function getFacturaSuplidores($facturaID)
    {
        $sendingQuery = "
        SELECT *
        FROM Facturas
        join Facturas_Suplidores on Facturas.ID = Facturas_Suplidores.Facturas_ID
        where ID = $facturaID
        ";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        return $object; 
    }
    
    public function getFacturaDistribuidores($facturaID)
    {
        $sendingQuery = "
        SELECT *
        FROM Facturas
        join Facturas_Distribuidores on Facturas.ID = Facturas_Distribuidores.Facturas_ID
        where ID = $facturaID
        ";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        return $object; 
    }
    

    public function insertFactura($factura,$flag =2){

        $sendingQuery = "
        
           INSERT INTO [dbo].[Facturas]
           ([Total]
           ,[Fecha]
           ,[ITBIS]
           ,[Decuento]
           ,[Tipo]
           ,[Empleados_ID])
            VALUES
                    (
                    $factura->Total,
                    GETDATE(),
                    '$factura->ITBIS',
                    '$factura->Descuento',
                    '$factura->Tipo',
                    $factura->Empleados_ID    
                    )";
        
        $this->db->query($sendingQuery);
        $sendingQuery2 = "SELECT top 1 ID from Facturas order by ID desc ";
        $facturaObject = $this->db->query($sendingQuery2)->row();
        
        if($flag == 1){
            $this->insertFacturaDistrubuidor($facturaObject->ID,$factura->enteID);
        }
        else if($flag == 0){
            $this->insertFacturaSuplidor($facturaObject->ID,$factura->enteID);
        
        }
        return $facturaObject->ID;
    }
    
    public function insertFacturaDistrubuidor($idFactura, $idDistribuidor){       
    $sendingQuery = "
                INSERT INTO [dbo].[Facturas_Distribuidores]
                  ([Facturas_ID]
                  ,[Distribuidores_ID])
                 VALUES
                        (
                        $idFactura,
                        $idDistribuidor
                            )";
        
        $this->db->query($sendingQuery);
    }
    
    public function insertFacturaSuplidor($idFactura, $idDistribuidor){
        $sendingQuery = "
                INSERT INTO [dbo].[Facturas_Suplidores]
                  ([Facturas_ID]
                  ,[Suplidores_ID])
                 VALUES
                        (
                        $idFactura,
                        $idDistribuidor
                        )";
        
        $this->db->query($sendingQuery);
    }

    
    public function useItems($id,$cantidad){
        
        $sendingQuery = "
            
        SELECT Cantidad 
        FROM Inventarios 
        WHERE Articulos_ID = $id";
        
        
        $inventoryCol = $this->db->query($sendingQuery)->row();
        
        $newVal = $inventoryCol->Cantidad - $cantidad;
        
        $sendingQuery2 = "
         UPDATE [dbo].[Inventarios]
            
            SET [Cantidad] = $newVal
            WHERE Articulos_ID = $id";
        $this->db->query($sendingQuery2);
        
    }
    
     public function checkQty($id, $cantidad){
        
        $sendingQuery = "
        SELECT Cantidad
        FROM Inventarios
        where Articulos_ID = $id";
        
        $query = $this->db->query($sendingQuery)->row();
        if($query->Cantidad > $cantidad-1){
             return true;
        }
           
        else{
           return false;
        }
       
    }
    
}
