<h2> Suplidores </h2>
    <form class="form-horizontal " role="form" method="post" action="/index.php/item/editQty">
        <table class='table table-striped table-hover'>
                            <thead>
                                <tr class='info'>
                                    <th>RNC</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Contacto</th>
                                    <th>Borrar</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($suplidores as $k => $item){ 
                                       echo "
                                            <tr class='active'>
                                                <td> ".$item->RNC." </td>
                                                <td> ".$item->Nombre."</td>
                                                <td> ".$item->Direccion." </td>
                                                <td> ".$item->Telefono."</td>
                                                <td> ".$item->Contacto."</td>
                                                <td><a href=/index.php/suplidores/deleteSuplidor/".$item->ID."> Borrar </td>    
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



