<h2> Facturas </h2>
<table class='table table-striped table-hover'>
                    <thead>
                        <tr class='info'>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>ITBIS</th>
                            <th>Descuento</th>
                            <th>Tipo</th>
                            <th>Empleado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($facturas as $employee){ 
                               echo "
                                    <tr class='active'>
                                        
                                        <td> ".$employee->Fecha."</td>
                                        <td> ".$employee->Total." </td>
                                        <td> ".$employee->ITBIS."</td>
                                        <td> ".$employee->Decuento."</td>
                                        <td> ".$employee->Tipo." </td>
                                        <td> ".$employee->Nombre." </td>
                                      
                                    </tr>
                             "; 
                            } 
                        ?>
                        
                         <?php
                            foreach ($facturas as $employee){ 
                               echo "
                                    <tr class='active'>
                                        
                                        <td> ".$employee->Fecha."</td>
                                        <td> ".$employee->Total." </td>
                                        <td> ".$employee->ITBIS."</td>
                                        <td> ".$employee->Decuento."</td>
                                        <td> ".$employee->Tipo." </td>
                                        <td> ".$employee->Nombre." </td>
                                      
                                    </tr>
                             "; 
                            } 
                        ?>
                         <?php
                            foreach ($facturas2 as $employee){ 
                               echo "
                                    <tr class='active'>
                                        
                                        <td> ".$employee->Fecha."</td>
                                        <td> ".$employee->Total." </td>
                                        <td> ".$employee->ITBIS."</td>
                                        <td> ".$employee->Decuento."</td>
                                        <td> ".$employee->Tipo." </td>
                                        <td> ".$employee->Nombre." </td>
                                    </tr>
                             "; 
                            } 
                        ?>
                        
                        
                    </tbody> 
</table>

