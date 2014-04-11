<?php

class production_model extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("item_model");
    
        
    }

    public function insertBash($qty,$employeesID){
        $sendingQuery = "
        INSERT INTO [dbo].[Producciones]
           ([Empleados_ID]
           ,[Cantidad]
           ,[Fecha])
          VALUES
           (
             $employeesID,
             $qty,
             GETDATE()
            ) ";   
    }


}
