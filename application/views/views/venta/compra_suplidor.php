
<div id="pepe2">
    <div class="container ">
       
        <div class=" col-sm-offset-1">
            <h2> Ingrese nueva venta distribuidor</h2><br>      
        </div>
           
        
            <form class="form-horizontal col-sm-offset-1 " role="form" method="post" action="/index.php/venta/compraSuplidor">
        
           
                    
            <div id="pepe2">
                    <?php
                    foreach($items as $item){
                            echo" <input id='".$item->Nombre."' type=hidden value=".$item->Precio." >";
                            } 
                    ?> 
            </div>
         
                
                 <div class="form-group ">
                     <label  class="col-sm-1 control-label ">Empleado</label>
                <div class="col-sm-3 ">
                   <select name='employee'>
                       <?php
                                            
                    foreach($employees as $employee){
                        echo" <option value=".$employee->ID."  >".$employee->Nombre." ".$employee->Apellido."</option>    ";
                          }  
                        ?>
                    </select>
                 
              </div>
                </div>
                
                 <div class="form-group ">
                     <label  class="col-sm-1 control-label ">Suplidores</label>
                <div class="col-sm-3 ">
                   <select name='enteID'>
                       <?php
                                            
                    foreach($employees1 as $employee){
                        echo" <option value=".$employee->ID."  >".$employee->Nombre." ".$employee->Apellido."</option>    ";
                          }  
                        ?>
                    </select>
                 
              </div>
                </div>
           
                
            <div class="form-group ">
                <label  class="col-sm-1 control-label ">Tipo</label>
                <div class="col-sm-3 ">
                    <select name="Tipo">
                  <option value="Contado" > Contado </option>  
                  <option value="Credito" > Credito </option> 
                            
                    
                    </select>
                </div>	  	
            </div>    
            
           
                
            <div class="form-group ">
                <label  class="col-sm-1 control-label ">Articulos</label>
                <div class="col-sm-3 ">
                    <select id="pepe">
                    <?php
                    foreach($items as $item){
                            echo" <option value=".$item->ID." >".$item->Nombre."</option>    ";
                            } 
                    ?>
                    </select>
                </div>	  	
            </div>      
             <div class="form-group " >
             
                 <div class="col-sm-5" >
                 
                 <table class='table table-striped table-hover'>
                    <thead>
                        <tr class='active'>
                           
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody id="foo">
                        
                         
                    </tbody> 
                    
                </table>
                 </div>  
                 
             </div>   
              <div class="form-group ">
                  
                  <label  class="col-sm-1 control-label col-sm-offset-3" >Total</label>
                <label  class="col-sm-1 control-label " id="arcangel">0</label>
              
            </div>
           
                
             <div class="form-group ">
                <label  class="col-sm-1 control-label ">Descuento</label>
                <div class="col-sm-3 ">
                    <input type="text" class="form-control"  name="Descuento"  >
                </div>	  	
            </div>
            
             <div class="form-group ">
                <label  class="col-sm-1 control-label">ITBIS</label>
                <div class="col-sm-3">
                    <input id='total' type="hidden" name='Total'>
                    <input type="text" class="form-control"  name="ITBIS"  >
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
<div class="text-center success">
        <?php 
if(isset($alert))    
    echo $alert;
?>
</div>

