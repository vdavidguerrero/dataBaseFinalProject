<?php

class item_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getInvenroty() {
        $sendingQuery = "
        SELECT *
        FROM Articulos
        join Inventarios on Articulos.ID = Inventarios.Articulos_ID";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        unset($object->Item_ID);
        return $object;
    }

    public function getItem($nombre) {
        $sendingQuery = "
        SELECT *
        FROM Articulos
        WHERE Nombre = '$nombre'
        ";
        $query = $this->db->query($sendingQuery);
        $object = $query->row();
        return $object;
    }

    public function insertItem($itemObject) {

        $sendingQuery = "
        
            INSERT INTO [dbo].[Articulos]
                       ([Nombre]
                       ,[Descripcion]
                       ,[Costo]
                       ,[Precio])
                 VALUES
                       (
                        '$itemObject->Nombre',
                        '$itemObject->Descripcion',
                         $itemObject->Costo,
                         $itemObject->Precio
                        )   ";
        $this->db->query($sendingQuery);

        $sendingQuery2 = "
        
           SELECT top 1 ID from Articulos order by ID desc ";
        $item = $this->db->query($sendingQuery2)->row();
        $sendingQuery3 = "
        
                INSERT INTO [dbo].[Inventarios]
                           ([Articulos_ID]
                           ,[Cantidad])
                     VALUES
                            ($item->ID,
                             0)";
        $this->db->query($sendingQuery3);
    }

    public function editItem($id, $cantidad) {

        $sendingQuery = "
        
         UPDATE [dbo].[Inventarios]
            
            SET [Cantidad] = $cantidad
            WHERE Articulos_ID = $id";
        $this->db->query($sendingQuery);
    }

    public function deleteItem($id) {

        $sendingQuery = "
        

       DELETE FROM [dbo].[Inventarios]
       WHERE Articulos_ID = $id
          
       DELETE FROM [dbo].[Articulos]
       WHERE ID = $id";
        $this->db->query($sendingQuery);
    }

    public function useItems($id, $cantidad) {

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
    
    public function addItems($id, $cantidad) {

        $sendingQuery = "
            
        SELECT Cantidad 
        FROM Inventarios 
        WHERE Articulos_ID = $id";


        $inventoryCol = $this->db->query($sendingQuery)->row();

        $newVal = $inventoryCol->Cantidad + $cantidad;

        $sendingQuery2 = "
         UPDATE [dbo].[Inventarios]
            
            SET [Cantidad] = $newVal
            WHERE Articulos_ID = $id";
        $this->db->query($sendingQuery2);
    }

    public function checkQty($id, $cantidad) {

        $sendingQuery = "
        SELECT Cantidad
        FROM Inventarios
        where Articulos_ID = $id";

        $query = $this->db->query($sendingQuery)->row();
        if ($query->Cantidad > $cantidad - 1) {
            return true;
        } else {
            return false;
        }
    }

    public function Factura_Articulo($facturaID, $articuloID, $qty) {
    
      $sendingQuery = "
         INSERT INTO [dbo].[Factura_Articulos]
           ([Facturas_ID]
           ,[Articulos_ID]
           ,[Cantidad])
     VALUES
           ($facturaID,
           $articuloID,
           $qty)
    ";

        $query = $this->db->query($sendingQuery);
    }
}
