<h2> Producion </h2>
    <form class="form-horizontal " role="form" method="post" action="/index.php/production/makeBash">
        <table class='table table-striped table-hover'>
                            <thead>
                                <tr class='info'>
                                    <th>Empleado</th>
                                    <th>Producto</th>
                                    <th>Materia Prima</th> 
                                    <th>Empaque</th>
                                    <th>Gastables</th>
                                    <th>Cantidad</th> 
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                
                                
                                <?php
                                  
                                       echo "
                                            <tr class='active'>
                                            <td>  <select name='employee'>
                                              ";
                                       foreach($employees as $employee){
                                           echo" <option value=".$employee->ID." >".$employee->Nombre." ".$employee->Apellido."</option>    ";
                                             }  
                                           echo "
                                                </select>
                                            </td> 
                                            
                                            <td>
                                            <select name='product'>
                                               <option value='_16'> Botellas 16 Onz</option>   
                                               <option value='_4'> Botellas 4 Gal</option>   
                                            </select>
                                            </td>
                                                <td>Quimico 1 <br> Quimico 2 <br> Quimico 3 </td>
                                                <td> Tapa <br> Etiqueta <br> Botella   </td>
                                                <td> Guantes <br> Redecilla  </td>
                                                <td> <input type='text' class='form-control' name='qty'> </td>

                                            </tr>
                                     "; 
                                     
                                ?>
                            </tbody> 
        </table>
        
        <div class="form-group">
                <div class="col-sm-offset-10 col-sm-10">
                    <button type="submit" class="btn btn-default">Producir</button>
                </div>
            </div>
    </form>
<div class="text-center success">
        <?php 
if(isset($alert))    
    echo $alert;
?>
</div>

