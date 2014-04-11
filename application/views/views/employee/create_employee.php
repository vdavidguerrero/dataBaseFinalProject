<div id="pepe2">
    <div class="container ">
       
        <div class=" col-sm-offset-1">
            <h2> Ingrese los datos del nuevo usuario</h2><br>      
        </div>
           
        
            <form class="form-horizontal col-sm-offset-1 " role="form" method="post" action="/index.php/employees/createEmployee">
        
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Nombre</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Nombre"  >
                </div>	  	
            </div>
                    
            <div class="form-group ">
                <label  class="col-sm-1 control-label ">Apellido</label>
                <div class="col-sm-3 ">
                    <input type="text" class="form-control"  name="Apellido"  >
                </div>	  	
            </div>
         
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Cédula</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="ID">
                </div>	  
            </div>
                
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Direccion</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Direccion" >
                </div>	  
            </div>
                
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Celular</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Celular"   >
                </div>	  
            </div>
               
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Sueldo</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Sueldo"  >
                </div>	  
            </div>
                
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Fecha Ingreso</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Fecha_Ingreso"  >
                </div>	  
            </div>
                    
           
                    
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>
            </div>
                   
        </form>

    </div>
    
</div>
