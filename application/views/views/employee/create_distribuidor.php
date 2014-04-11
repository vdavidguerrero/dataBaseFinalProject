<div id="pepe2">
    <div class="container ">
       
        <div class=" col-sm-offset-1">
            <h2> Ingrese los datos del nuevo usuario</h2><br>      
        </div>
           
        
            <form class="form-horizontal col-sm-offset-1 " role="form" method="post" action="/index.php/distribuidores/createDistribuidor">
        
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
                <label  class="col-sm-1 control-label">Plazo</label>
                <div class="col-sm-3">
                    <select name="Plazo_Credito">
                        <option value=0>sin credito</option>
                        <option value=15>15 dias</option>
                        <option value=30>30 dias</option>
                        <option value=45>45 dias</option>
                    </select>
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
