<?php
return [
    "estado" => [
        "enviado" => 0, // el user envia y los tralleres reciben
        "espera" => 1, // el user acepta oferta y espera que le asignen
        "camino" => 2, // el user acepta oferta y espera que le asignen
        "proceso" => 3,  // el user espera que llegue el mecanico
        "pagar" => 4, // el mecanico llegó y esta en proceso
        "fin" => 5,   // 
    ],
    "msg" => [
        "enviado" => "Enviado", // el user envia y los tralleres reciben
        "espera" => "En espera", // el user acepta oferta y espera que le asignen
        "camino" => "En camino", // el user acepta oferta y espera que le asignen
        "proceso" => "En proceso",  // el user espera que llegue el mecanico
        "pagar" => "Por pagar", // el mecanico llegó y esta en proceso
        "fin" => "Finalizado",   //
    ]
];