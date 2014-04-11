<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Sistema Agua Castalia</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"   rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css') ?>"   rel="stylesheet">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
        
   


  </head>

  <body>
<div class="containerMinHeigh">

    <div class="container ">
        <div class="">
            <h2> Agua Castalia</h2><br>
            <div class="col-md-10 ">
                <div class="form-inline ">
                    
                    
                    <div class="dropdown form-group ">
                        <button class="btn dropdown-toggle" >
                            <a  tabindex="-1" href="/index.php/production/makeBash"> Produccion</a>
                        </button>
                       
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Empleados
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/employees/createEmployee" >Agregar Empleados</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/employees/showEmployees">Administrar Empleados</a>
                            </li>
                             <li role="presentation">
                                <a  tabindex="-1" href="/index.php/distribuidores/createDistribuidor">Agregar Distribuidores </a>
                            </li>
                             <li role="presentation">
                                <a  tabindex="-1" href="/index.php/distribuidores/showDistribuidores">Administrar Distribuidores </a>
                            </li>
                        </ul>
                    </div>
                    
                      <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Suplidores
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/suplidores/createSuplidor">Agregar Suplidores</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/suplidores/showSuplidores">Administrar Suplidores</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Inventario
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/item/createItem">Agregar Articulo</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/item/showInventory">Ver Inventario</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Transacciones
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                           
                           
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Cotizacion con suplidores</a>
                            </li>
                            
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/venta/compraSuplidor">Compra a suplidores</a>
                            </li>
                            
                             <li role="presentation">
                                <a  tabindex="-1" href="/index.php/venta/ventaMostrador">Venta Por Mostrador</a>
                            </li>
                            
                             <li role="presentation">
                                <a  tabindex="-1" href="/index.php/venta/ventaDistribuidor">Venta a distribuidores</a>
                            </li>
                        </ul>
                    </div>
                 
                    
                    <div class="dropdown form-group">
                        <button class="btn ">
                          <a  tabindex="-1" href="/index.php/venta/CxC"> Cuentas Por Cobrar</a>
                        </button>
                 
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn ">
                          <a  tabindex="-1" href="/index.php/venta/CxP"> Cuentas Por Pagar</a>
                        </button>
                 
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Reportes
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/reports/ventas">Ventas</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/reports/CxC">Cuentas Por Cobrar</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="/index.php/reports/CxP">Cunetas Por Pagar</a>
                            </li>
                           
                             <li role="presentation">
                                <a  tabindex="-1" href="/index.php/reports/logs">Logs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="secondContainerMargin">
            <div class="col-md-2">
                <ul class="nav nav-sidebar">
                    <text><b>
                    <?php 
                    echo $sideBar;
                    
                    ?>
                    </b></text>
                </ul>
            </div>

            <div class="col-md-8 col-md-offset-1">
