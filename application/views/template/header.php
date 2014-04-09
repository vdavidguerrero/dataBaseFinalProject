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

  </head>

  <body>
<div class="containerMinHeigh">

    <div class="container ">
        <div class="">
            <h2> Agua Castalia</h2><br>
            <div class="col-md-10 ">
                <div class="form-inline ">
                    <div class="dropdown form-group ">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Produccion
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Botellas</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Botellones</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Empleados
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="index.php/employees/editEmployees" >Agregar Empleados</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="index.php/employees/showEmployees">Administrar Empleados</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Inventario
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Agregar Articulo</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Ver Inventario</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Transacciones
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Venta</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Compra</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Cotizacion</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Cuentas Por Pagar
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Realizar Pago</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Ver Cuentas por pagar</a>
                            </li>
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Cuentas Por Cobrar
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Realizar Cobro</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Ver Cuentas por Cobrar</a>
                            </li>
                    </div>
                    <div class="dropdown form-group">
                        <button class="btn dropdown-toggle "id="dropdownMenu1" data-toggle="dropdown">
                            Reportes
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Ventas</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Gastos</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Inventario</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Devoluciones</a>
                            </li>
                            <li role="presentation">
                                <a  tabindex="-1" href="#">Ganancias</a>
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
