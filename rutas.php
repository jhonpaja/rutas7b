<?php
    require "conexion.php";
    require "modelos/Ruta.php";    
    require "modelos/Biker.php";
    require "utilitarios.php";

    $sede = "";
    $admin7b = "";
    $isAdmin = false;

    if (isset($_POST['sede'])){ 
        $sede = $_POST['sede']; 
        //print($sede);
    }

    if (isset($_POST['admin'])){ 
        $admin7b = $_POST['admin']; 
        //print($admin7b);
    }
    
    if (isset($_GET['admin'])){ 
        $admin7b = $_GET['admin']; 
        //print($admin7b);
        if($admin7b="55958dc4-a894-11ed-afa1-0242ac120002"){
            //print($admin7b);
            $isAdmin = true;
        }
    }

    //Creamos una instancia de la  clase devuelve productos
    //$rutas = null;
    $rutas = new Ruta();
    $array_rutas=$rutas->get_rutas();

    

    //var_dump($array_rutas);
    //print_r($array_rutas);

    if($sede==""){
        $array_rutas_sede = $array_rutas;
    }else{
        $array_rutas_sede = array_filter( $array_rutas, function( $e ) {
            $sede = $_POST['sede']; 
            return $e['sede'] == $sede;
        });
    }

    

    //var_dump($array_rutas_sede);

?>

<div class="alert alert-info" role="alert">
    <h4 class="alert-heading"><b>Bienvenido Biker !!!</b></h4>
    <p>Inscribete y participa de nuestras próximas rutas.</p>
    <hr>
    <form action="index.php" method="post">
        <select name="sede" id="sede" class="form-select form-select-sm" aria-label=".form-select-lg example">
            <option selected value="" <?php if($sede=="") print("selected") ?> >Todas las Sedes</option>
            <option value="ESTE" <?php if($sede=="ESTE") print("selected") ?> >Sede ESTE</option>
            <option value="NORTE" <?php if($sede=="NORTE") print("selected") ?> >Sede NORTE</option>
            <option value="SUR" <?php if($sede=="SUR") print("selected") ?> >Sede SUR</option>
        </select>
    </form>
</div>

    
    
    <?php 
        if($isAdmin){
            //print "<hr>";
            print "<center><b>Bienvenido ADMIN</b></center>";
    ?>
        &nbsp;
        <form id="formNuevaRuta" method="POST" action="nuevaruta.php">
            <div class="center">                
                <center><button class="btn btn-info" type="submit">Crear nueva ruta</button></center>
            </div>    
        </form>
        &nbsp;
    <?php        
        }
    ?>

    <div>    
        <ol class="list-group list-group-numbered"> 
            <?php
                foreach($array_rutas_sede as $elemento)
                {                      
                    $timestamp = strtotime($elemento['fecha']);
                    $nombreDia = traducirDia(date("l", $timestamp));
                    $dia = date("d", $timestamp);
                    $mes = date("M", $timestamp);
                    $anio = date("Y", $timestamp);
                    //echo $anio;

                    //echo $timestamp;    echo "<br>";
                    $fecha_ruta = $timestamp;
                    $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                    //echo $fecha_actual;
                    
                    
                    
                    $timestamp = strtotime($elemento['hora']);
                    $hora = date("h:i A", $timestamp);
                    
                    
                    
                    //-------------------------------------
                    $ruta = new Ruta();
                    
                    $nrobikers = 0;
                    $nrobikersruta = $ruta->get_bikers_ruta((int)$elemento['idruta']);
                    foreach($nrobikersruta as $bikers)
                    {  
                        $nrobikers = $bikers['nrobikers'];
                    }
                    
                   // if($fecha_ruta >= $fecha_actual){
                        //echo "MOSTRAR RUTA";
                    
            ?>        
                <form id="formruta" action="ruta.php" method="post">
                    <input type="hidden" name="rutaid" value="<?php echo $elemento['idruta'] ?>">
                </form>
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"  id="ruta.php?rutaid=<?php echo $elemento['idruta']?>" >                      
                    <div class="ms-2 me-auto">
                    <div class="fw-bold" style="color:#0DCAF0;"><?php echo $elemento['nombreruta'] ?></div>
                    <span style="font-size:0.85em;"><?php echo $nombreDia;?> <?php echo $dia;?> <?php echo $mes;?> <?php echo $anio;?> - <?php echo $hora ?> </br>                    
                    <use xlink:href="bootstrap-icons.svg#alarm-fill"></use> <?php echo $elemento['puntoEncuentro'] ?> </br>
                    </span>
                    <span style="font-size:0.8em;"><b>Sede <?php echo $elemento['sede'] ?></b> - <?php echo $elemento['kilometros'] ?> kms - Niveles: <?php echo $elemento['leyenda'] ?></span>
                    
                    </div>
                    <img src="assets/img/tipo_<?php echo $elemento['tipo']  ?>.jpg" width="50" style="margin-top:30px;">
                    <span class="badge bg-info rounded-pill" style="width: 30px;">
                        <?php 
                            //echo $elemento['nrobikers']
                            echo $nrobikers;
                        ?>
                    </span>                
                </li>
            <?php
                  //  }
                }   
            ?>

        </ol>
    </div>