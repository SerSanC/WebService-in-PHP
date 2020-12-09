<?php

echo "Indique el ID del curso: ";
$idCurso = rtrim(fgets(STDIN));

$parametros = array(
    CURLOPT_URL => 'http://localhost:8000/curso/' . $idCurso,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true
);

$conexion = curl_init();
curl_setopt_array($conexion, $parametros);
$respuesta = curl_exec($conexion);

if (curl_getinfo($conexion, CURLINFO_HTTP_CODE) === 200) {
    echo $respuesta;
} else {
    echo 'Se ha producido un error';
}

curl_close($conexion);

?>