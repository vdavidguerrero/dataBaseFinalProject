<h2> Inventario </h2>
    <form class="form-horizontal " role="form" method="post" action="/index.php/item/editQty">
        <table class='table table-striped table-hover'>
                            <thead>
                                <tr class='info'>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Costo</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                   
                                    
                                    <th>Borrar</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($inventory as $k => $item){ 
                                       echo "
                                            <tr class='active'>
                                                <td> ".$item->Nombre." </td>
                                                <td> ".$item->Descripcion."</td>
                                                <td> ".$item->Costo." </td>
                                                <td> ".$item->Precio."</td>
                                                <td> ".$item->Cantidad."</td>
                                                
                                                <td><a href=/index.php/item/deleteItem/".$item->ID."> Borrar </td>    
                                            </tr>
                                     "; 
                                    } 
                                ?>
                            </tbody> 
        </table>
        
        <div class="form-group">
                <div class="col-sm-offset-8 col-sm-10">
                    <button type="submit" class="btn btn-default">Edit</button>
                </div>
            </div>
    </form>



