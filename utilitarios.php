<?php
function traducirDia($diaIngles)
{
    if ($diaIngles == "Sunday")
        $dia = str_replace("Sunday", "Domingo", $diaIngles);
    
    if ($diaIngles == "Monday")
        $dia = str_replace("Monday", "Lunes", $diaIngles);        

    if ($diaIngles == "Tuesday")
        $dia = str_replace("Tuesday", "Martes", $diaIngles);
    
    if ($diaIngles == "Wednesday")
        $dia = str_replace("Wednesday", "Miércoles", $diaIngles);

    if ($diaIngles == "Thursday")
        $dia = str_replace("Thursday", "Jueves", $diaIngles);

    if ($diaIngles == "Friday")
        $dia = str_replace("Friday", "Viernes", $diaIngles);

    if ($diaIngles == "Saturday")
        $dia = str_replace("Saturday", "Sábado", $diaIngles);

    return $dia;
}
?>