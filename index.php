<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.png" type="png" sizes="16x16">
    <link rel="stylesheet" href="assets/css/spinner.css">
    
    <title>Rutas de entrenamiento Sevenbikersperu.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="assets/jquery-3.6.0.slim.js"></script>
</head>
<body>
    <nav class="navbar bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <img src="assets/icons/7-square.svg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
                <b>RUTAS SEVENBIKERSPERU</b>
            </a>
        </div>
    </nav>

    <main id="container-main">

    </main>

    <?php include 'sidemenu.php';?>

</body>

<script>

    function menu(url){
        clearContainer();
        //$('#container-main').load(url).wait(1000);

        setTimeout(function(){
            $('#container-main').load(url);
        }, 2000);
    }

    function menuPost(url){
        clearContainer();
        $.post(url,{sede:'2'}).done(function(response){
            $('#container-main').load(response);
        });
    }

    function clearContainer(){
        $('#container-main').empty();
        $('#container-main').load('spinner.html');
    }

    $(function() {        
        menu('rutas.php');
    });
</script>

</html>