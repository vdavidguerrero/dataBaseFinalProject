<?php

class factura_model extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    
        
    }
    
    
    
    public function abonarCxC($idCxC, $monto){
        
     $sendingQuery = "  INSERT INTO [dbo].[Recibos]
           ([Monto]
           ,[Fecha])
     VALUES
           ('$monto',
            GETDATE())";
     
     $this->db->query($sendingQuery);
     
      $sendingQuery2 = "
        
           SELECT top 1 ID from Recibos order by ID desc ";
      
      $item = $this->db->query($sendingQuery2)->row();
                
        $sendingQuery3 =     "   INSERT INTO [dbo].[Recibos_Cobros]
           ([Recibos_Genericos_ID]
           ,[Cuentas_Por_Cobrar])
             VALUES
           ($item->ID
           ,$idCxC)";
      
     
        $this->db->query($sendingQuery3);
    
        $sendingQuery10 = "
        SELECT
        [Monto_Pendiente]
        FROM [aguacastalia].[dbo].[Cuentas_Por_Cobrar]
         where ID = $idCxC";


        $cxcCol = $this->db->query($sendingQuery10)->row();

        $newVal = $cxcCol->Monto_Pendiente - $monto;
       
        
        $sendingQuery11 = "
         UPDATE [dbo].[Cuentas_Por_Cobrar]
            
            SET [Monto_Pendiente] = $newVal
            WHERE ID = $idCxC";
        $this->db->query($sendingQuery11);
        
    }
    
    
    public function abonarCxP($idCxC, $monto){
        
     $sendingQuery = "  INSERT INTO [dbo].[Recibos]
           ([Monto]
           ,[Fecha])
     VALUES
           ('$monto',
            GETDATE())";
     
     $this->db->query($sendingQuery);
     
      $sendingQuery2 = "
        
           SELECT top 1 ID from Recibos order by ID desc ";
      
      $item = $this->db->query($sendingQuery2)->row();
                
        $sendingQuery3 =     "   INSERT INTO [dbo].[Recibos_Pagos]
           ([Recibos_Genericos_ID]
           ,[Cuentas_Por_Pagar])
             VALUES
           ($item->ID
           ,$idCxC)";
      
     
        $this->db->query($sendingQuery3);
    
        $sendingQuery10 = "
        SELECT
        [Monto_Pendiente]
        FROM [aguacastalia].[dbo].[Cuentas_Por_Pagar]
         where ID = $idCxC";


        $cxcCol = $this->db->query($sendingQuery10)->row();

        $newVal = $cxcCol->Monto_Pendiente - $monto;
       
        
        $sendingQuery11 = "
         UPDATE [dbo].[Cuentas_Por_Pagar]
            
            SET [Monto_Pendiente] = $newVal
            WHERE ID = $idCxC";
        $this->db->query($sendingQuery11);
        
    }
    
 
    
    public function getCxC(){
          $sendingQuery = "
         select *, Cuentas_Por_Cobrar.ID as facID from Cuentas_Por_Cobrar
         join Facturas_Distribuidores on Facturas_Distribuidores.Facturas_ID = Facturas_Distribuidores
         join Facturas on Facturas_Distribuidores.Facturas_ID = Facturas.ID
         join Distribuidores on Distribuidores.Personas_ID = Facturas_Distribuidores.Distribuidores_ID 
         join Personas on Distribuidores.Personas_ID = Personas.ID
             ";
              return $query = $this->db->query($sendingQuery)->result();
    }
    
    
     public function getCxP(){
          $sendingQuery = "
         select *, Cuentas_Por_Pagar.ID as facID from Cuentas_Por_Pagar
         join Facturas_Suplidores on Facturas_Suplidores.Facturas_ID = Facturas_Suplidores
         join Facturas on Facturas_Suplidores.Facturas_ID = Facturas.ID
         join Suplidores on Suplidores.ID = Facturas_Suplidores.Suplidores_ID 
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
    

     public function getFacturas()
    {
        $sendingQuery = "
        SELECT *
        FROM Facturas
        join Personas on  Personas.ID = Facturas.Empleados_ID";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        return $object; 
    }
    public function getFacturas2()
    {
        $sendingQuery = "
        SELECT *
        FROM Facturas
        join Facturas_Suplidores on Facturas_Suplidores.Facturas_ID = Facturas.ID
        join Personas on  Personas.ID = Facturas.Empleados_ID
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
    
    
    
    
    public function cotizar($factura,$flag =0){

        $sendingQuery = "
        
           INSERT INTO [dbo].[Cotizaciones]
           ([Total]
           ,[Fecha]
           ,[ITBIS]
           ,[Decuento]
           ,[Tipo])
            VALUES
                    (
                    $factura->Total,
                    GETDATE(),
                    '$factura->ITBIS',
                    '$factura->Descuento',
                    '$factura->Tipo'    
                    )";
        
        $this->db->query($sendingQuery);
        $sendingQuery2 = "SELECT top 1 ID from Cotizaciones order by ID desc ";
        $facturaObject = $this->db->query($sendingQuery2)->row();
        
        if($flag == 1){
            $this->insertFacturaDistrubuidor($facturaObject->ID,$factura->enteID);
        }
        else if($flag == 0){
            $this->cotizar2($facturaObject->ID,$factura->enteID);
        
        }
        return $facturaObject->ID;
    }
 
    
    public function cotizar2($idFactura, $idDistribuidor){
        $sendingQuery = "
                INSERT INTO [dbo].[Cotizaciones_Suplidores]
                  ([Cotizaciones_ID]
                  ,[Suplidores_ID])
                 VALUES
                        (
                        $idFactura,
                        $idDistribuidor
                        )";
        
        $this->db->query($sendingQuery);
    }
    
}
