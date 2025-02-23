/**
 * Clase para manejar operaciones básicas de una calculadora.
 *
 * Esta clase proporciona métodos para realizar operaciones aritméticas
 * básicas como suma, resta, multiplicación y división.
 *
 * Métodos disponibles:
 * - sumar($a, $b): Retorna la suma de dos números.
 * - restar($a, $b): Retorna la resta de dos números.
 * - multiplicar($a, $b): Retorna la multiplicación de dos números.
 * - dividir($a, $b): Retorna la división de dos números.
 *
 * Ejemplo de uso:
 * $calculadora = new Calculadora();
 * echo $calculadora->sumar(2, 3); // Imprime 5
 *
 * @package Calculadora
 * @author Tu Nombre
 * @version 1.0
 */
<?php
    include 'conexion2.php';

    $marca = $_GET['marca'];

    $consulta = "SELECT * FROM  planta WHERE marca= '$marca'";
    $resultado = $c ->query($consulta);

    while($fila = $resultado->fetch_array()){
        $usuario[] = array_map('utf8_encode',$fila);
    }

    echo json_encode($usuario);
    $resultado->close();
?>