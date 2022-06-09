<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
// Importing DBConfig.php file.
include 'DBConfig.php';
 
// Connecting to MySQL Database.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 $S_correo = $obj['correo'];
 $S_valorPrestamo = $obj['valor_prestamo'];
 $S_tipoPrestamo = $obj['tipo_prestamo'];
 $S_numeroCuotas = $obj['numero_cuotas'];
 
 $Sql_Query = "UPDATE clientdetailtable SET  valor_prestamo = '$S_Class', tipo_prestamo = '$S_Phone_Number', numero_cuotas = '$S_Email' WHERE student_id = $S_ID";
 
 
 if(mysqli_query($con,$Sql_Query)){
 
    // If the record inserted successfully then show the message.
   $MSG = 'El estudiante ha sido actualizado correctamente ...' ;
    
   // Converting the message into JSON format.
   $json = json_encode($MSG);
    
   // Echo the message.
    echo $json ;
    
    }
    else{
    
    echo 'Inténtelo de nuevo';
    
    }
    mysqli_close($con);
   
 
 ?>