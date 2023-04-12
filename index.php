<?php

function get_fibonacci_sequence($start_position = 1, $num_elements = 10, $max_number = null) {
    /*
    Genera una cadena de números de Fibonacci en formato JSON.

    Parámetros:
        $start_position (int, opcional): La posición de inicio de la cadena. Por defecto es 1.
        $num_elements (int, opcional): El número de elementos en la cadena. Por defecto es 10.
        $max_number (int, opcional): El número máximo en la cadena. Por defecto es null.

    Retorna:
        string: Una cadena en formato JSON que contiene la consecución de números de Fibonacci.
    */
    if ($start_position <= 0 || $num_elements <= 0) {
        throw new Exception("La posición de inicio y el número de elementos deben ser mayores a cero.");
    }

    $sequence = array();
    $a = 0;
    $b = 1;
    for ($i = $start_position; $i < $start_position + $num_elements; $i++) {
        if ($max_number && $a > $max_number) {
            break;
        }
        array_push($sequence, $a);
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }

    return json_encode($sequence);
}

// Ejemplos de uso
// Obtener los primeros 10 números de Fibonacci
echo get_fibonacci_sequence();
// Obtener los siguientes 5 números de Fibonacci desde la posición 15
echo get_fibonacci_sequence(15, 5);
// Obtener los números de Fibonacci menores a 100
echo get_fibonacci_sequence(1, 100, 100);

?>
