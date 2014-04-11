<?php

class suplidores_model extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    }
    
    public function getSuplidores()
    {
        $sendingQuery = "
        SELECT * 
        FROM Suplidores";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        unset($object->Item_ID);
        return $object; 
    }
    

    public function getSuplidor($ID)
    {
        $sendingQuery = "
        SELECT *
        FROM Suplidores
        WHERE ID = $ID
        ";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        return $object; 
    }


    public function insertSuplidor($itemObject){

        $sendingQuery = "
        
        INSERT INTO [dbo].[Suplidores]
           ([Nombre]
           ,[RNC]
           ,[Direccion]
           ,[Telefono]
           ,[Contacto])
        VALUES
            (
             '$itemObject->Nombre',
             '$itemObject->RNC',
             '$itemObject->Direccion',
             '$itemObject->Telefono',
             '$itemObject->Contacto'
            )

                         ";
        $this->db->query($sendingQuery);
    }
    
    public function editSuplidor($id,$cantidad){
        
//        $sendingQuery = "
//        
//         UPDATE [dbo].[Suplidores]
//            
//            SET [Cantidad] = $cantidad
//            WHERE Articulos_ID = $id";
//        $this->db->query($sendingQuery);
        
    } 
    
    public function deleteSuplidor($id){
        
        $sendingQuery = "
            DELETE FROM [dbo].[Suplidores]
            WHERE ID = $id";
        
        $this->db->query($sendingQuery);
    }
    
}
