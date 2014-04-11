<div id="pepe2">
    <div class="container ">
       
        <div class=" col-sm-offset-1">
            <h2> Ingrese los datos del nuevo usuario</h2><br>      
        </div>
           
            <form class="form-horizontal col-sm-offset-1 " role="form" method="post" action="/index.php/suplidores/createSuplidor">
        
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Nombre</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Nombre"  >
                </div>	  	
            </div>
                    
            <div class="form-group ">
                <label  class="col-sm-1 control-label ">RNC</label>
                <div class="col-sm-3 ">
                    <input type="text" class="form-control"  name="RNC"  >
                </div>	  	
            </div>
         
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Direccion</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Direccion">
                </div>	  
            </div>
                
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Telefono</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Telefono" >
                </div>	  
            </div>        
            
                <div class="form-group ">
             <label  class="col-sm-1 control-label">Contacto</label>
             <div class="col-sm-3">
                 <input type="text" class="form-control"  name="Contacto" >
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
