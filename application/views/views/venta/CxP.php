<h2> Cuentas por Pagar </h2>
 <form class="form-horizontal " role="form" method="post" action="/index.php/venta/pagar">
    <table class='table table-striped table-hover'>
                        <thead>
                            <tr class='info'>
                                <th>ID</th>
                                <th>Distribuidor</th>
                                <th>Total</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($employees as $employee){ 
                                    if($employee->Monto_Pendiente > 0)
                                   echo "
                                        <tr class='active'>
                                            <td> ".$employee->facID." </td>
                                            <td> ".$employee->Nombre."</td>
                                            <td> ".$employee->Monto_Pendiente." </td>
                                            <td> <div class='col-md-8'><input type='text' class='form-control ' name='".$employee->facID."'> </div> </td>
                                        </tr>
                                 "; 
                                } 
                            ?>
                        </tbody> 
 </table>
      <div class="form-group">
                <div class="col-sm-offset-8 col-sm-10">
                    <button type="submit" class="btn btn-default">Pagar</button>
                </div>
            </div>
</form>