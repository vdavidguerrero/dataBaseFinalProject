<h2> Empleados </h2>

<table class='table table-striped table-hover'>
                    <thead>
                        <tr class='info'>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Celular</th>
                            <th>Sueldo</th>
                            <th>Fecha  Ingreso</th>
                            <th>Edit</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($employees as $employee){ 
                               echo "
                                    <tr class='active'>
                                        <td> ".$employee->ID." </td>
                                        <td> ".$employee->Nombre."</td>
                                        <td> ".$employee->Apellido." </td>
                                        <td> ".$employee->Direccion."</td>
                                        <td> ".$employee->Celular."</td>
                                        <td> ".$employee->Sueldo." </td>
                                        <td> ".$employee->Fecha_Ingreso." </td>
                                        <td><a href=index.php/employees/addEmployee/".$employee->ID."> Edit </td>    
                                    </tr>
                             "; 
                            } 
                        ?>
                    </tbody> 
</table>



