<?php

class employees_model extends CI_Model{

    var $ID,
        $Sueldo,
        $Horario,
        $Fecha_Ingreso,
        $Nombre,
        $Apellido,
        $Direccion,
        $Celular;


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    /**
      * Get a employee by its cedula
      * 
      * @param int employee's cedula
      * @return employeeObeject 
      * @author Vincent Guerrero <v.davidguerrero@gmail.com>
      * @todo  Ready 
      * @see getCar
      */ 
    public function getEmployee($cedula)
    {
        $sendingQuery = "
        SELECT *
        FROM Empleados
        join Personas on Personas.Cedula = Empleados.Personas_ID
        where Personas.Cedula = ".$cedula."
        ";
        $query = $this->db->query($sendingQuery);
        $object = $query->row();
        unset($object->Personas_ID);
        return $object; 

    }
    
       /**
      * Get a employee by its cedula
      * 
      * @param int employee's cedula
      * @return employeeObeject 
      * @author Vincent Guerrero <v.davidguerrero@gmail.com>
      * @todo  Ready 
      * @see getCar
      */ 
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

    
    /**
    * Get a employee by its cedula
    * 
    * @param int employee's cedula
    * @return employeeObeject 
    * @author Vincent Guerrero <v.davidguerrero@gmail.com>
    * @todo  Ready 
    * @see getCar
    */ 
    public function insertEmployee($empleadoObject = 1){

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
           ,[Horario]
           ,[Fecha_Ingreso])
           VALUES(
				    $empleadoObject->ID
				   ,$empleadoObject->Sueldo
				   ,'$empleadoObject->Horario'
				   ,'$empleadoObject->Fecha_Ingreso'
				  )
                                    ";

            
            
        $this->db->query($sendingQuery);
        
       
    }


}