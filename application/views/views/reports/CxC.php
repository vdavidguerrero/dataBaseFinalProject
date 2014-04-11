<h2> Cuentas por Cobrar </h2>
 
    <table class='table table-striped table-hover'>
                        <thead>
                            <tr class='info'>
                                <th>ID</th>
                                <th>Distribuidor</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($employees as $employee){ 
                                    echo "
                                        <tr class='active'>
                                            <td> ".$employee->facID." </td>
                                            <td> ".$employee->Nombre."</td>
                                            <td> ".$employee->Monto_Pendiente." </td>
                                        </tr>
                                 "; 
                                } 
                            ?>
                        </tbody> 
 </table>
    