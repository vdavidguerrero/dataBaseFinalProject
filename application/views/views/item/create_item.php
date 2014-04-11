<div id="pepe2">
    <div class="container ">
       
        <div class=" col-sm-offset-1">
            <h2> Ingrese los datos del nuevo usuario</h2><br>      
        </div>
           
            <form class="form-horizontal col-sm-offset-1 " role="form" method="post" action="/index.php/item/createItem">
        
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Nombre</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Nombre"  >
                </div>	  	
            </div>
                    
            <div class="form-group ">
                <label  class="col-sm-1 control-label ">Descripcion</label>
                <div class="col-sm-3 ">
                    <input type="text" class="form-control"  name="Descripcion"  >
                </div>	  	
            </div>
         
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Costo</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Costo">
                </div>	  
            </div>
                
            <div class="form-group ">
                <label  class="col-sm-1 control-label">Precio</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control"  name="Precio" >
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
