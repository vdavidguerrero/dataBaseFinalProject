<?php

class employees_model extends CI_Model{

//    var $ID,
//        $Sueldo,
//        $Horario,
//        $Fecha_Ingreso,
//        $Nombre,
//        $Apellido,
//        $Direccion,
//        $Celular;


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    
    public function getEmployee($cedula)
    {
        $sendingQuery = "
        SELECT *
        FROM Empleados
        join Personas on Personas.ID = Empleados.Personas_ID
        where Personas.ID = $cedula ";
        $query = $this->db->query($sendingQuery);
        $object = $query->row();
        unset($object->Personas_ID);
        return $object; 
    }
 
    public function getEmployees()
    {
        $sendingQuery = "
        SELECT *
        FROM Empleados
        join Personas on Personas.ID = Empleados.Personas_ID";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        foreach($object as $k => $temp){
             unset($object[$k]->Personas_ID);
        }
       
        return $object; 

    }
    
    public function getDistribuidor($cedula)
    {
        $sendingQuery = "
        SELECT *
        FROM Distribuidores
        join Personas on Personas.ID = Distribuidores.Personas_ID
        where Personas.ID = $cedula ";
        $query = $this->db->query($sendingQuery);
        $object = $query->row();
        unset($object->Personas_ID);
        return $object; 
    }
    
     public function getDistribuidores()
    {
        $sendingQuery = "
        SELECT *
        FROM Distribuidores
        join Personas on Personas.ID = Distribuidores.Personas_ID";
        $query = $this->db->query($sendingQuery);
        $object = $query->result();
        foreach($object as $k => $temp){
             unset($object[$k]->Personas_ID);
        }
       
        return $object; 

    }

    
    public function insertEmployee($empleadoObject){

        $sendingQuery = "
        INSERT INTO [dbo].[Personas]
           ([ID]
           ,[Nombre]
           ,[Apellido]
           ,[Direccion]
           ,[Celular])
			VALUES(      $empleadoObject->ID
				   ,'$empleadoObject->Nombre'
				   ,'$empleadoObject->Apellido'
				   ,'$empleadoObject->Direccion'
				   ,'$empleadoObject->Celular'
				   )
			

			INSERT INTO [dbo].[Empleados]
           ([Personas_ID]
           ,[Sueldo]
           ,[Fecha_Ingreso])
           VALUES(
				    $empleadoObject->ID
				   ,$empleadoObject->Sueldo
				   ,'$empleadoObject->Fecha_Ingreso'
				  )
                                    ";

            
            
        $this->db->query($sendingQuery);
    }
    
    public function insertDistribuidores($empleadoObject){

        $sendingQuery = "
        INSERT INTO [dbo].[Personas]
           ([ID]
           ,[Nombre]
           ,[Apellido]
           ,[Direccion]
           ,[Celular])
			VALUES(      $empleadoObject->ID
				   ,'$empleadoObject->Nombre'
				   ,'$empleadoObject->Apellido'
				   ,'$empleadoObject->Direccion'
				   ,'$empleadoObject->Celular'
				   )
			

			INSERT INTO [dbo].[Distribuidores]
           ([Personas_ID]
           ,[Plazo_Credito]
           ,[Fecha_Ingreso])
           VALUES(
				    $empleadoObject->ID
				   ,$empleadoObject->Plazo_Credito
				   ,'$empleadoObject->Fecha_Ingreso'
				  )
                                    ";

            
            
        $this->db->query($sendingQuery);
    }
    
     public function deleteEmployee($id){
        
        $sendingQuery = "
        
       DELETE FROM [dbo].[Empleados]
       WHERE Personas_ID = $id

       DELETE FROM [dbo].[Personas]
       WHERE ID = $id
          ";
       
        $this->db->query($sendingQuery);
        
        
    }
    
    public function deleteDistribuidor($id){
        
        $sendingQuery = "
        
       DELETE FROM [dbo].[Distribuidores]
       WHERE Personas_ID = $id

       DELETE FROM [dbo].[Personas]
       WHERE ID = $id
          ";
       
        $this->db->query($sendingQuery);
        
        
    }


}