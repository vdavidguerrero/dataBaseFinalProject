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
                            <th>Editar</th>
                            <th>Borrar</th>
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
                                        <td><a href=/index.php/employees/editEmployee/".$employee->ID."> Edit </td> 
                                        <td><a href=/index.php/employees/deleteEmployee/".$employee->ID."> Delete </td>
                                                
                                    </tr>
                             "; 
                            } 
                        ?>
                    </tbody> 
</table>



