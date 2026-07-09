<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/categorias', function () {
    $categorias = json_decode(json_encode([
        ["codigo" => "A02", "nombre" => "Medicamentos para el tratamiento de Trastornos causados por Ácidos"],
        ["codigo" => "A03", "nombre" => "Medicamentos contra Trastornos Funcionales Gastrointestinales"],
        ["codigo" => "A04", "nombre" => "Medicamentos Antieméticos y Antinauseosos"],
        ["codigo" => "A06", "nombre" => "Medicamentos para el Estreñimiento"],
        ["codigo" => "A07", "nombre" => "Medicamentos Antidiarreicos, Antiinflamatorios y Antiinfecciosos Intestinales"],
        ["codigo" => "A10", "nombre" => "Medicamentos usados en Diabetes"],
        ["codigo" => "A11", "nombre" => "Vitaminas"],
        ["codigo" => "A12", "nombre" => "Suplementos Minerales"],
    ]));

    $tabla = "<table>";
    $tabla .= "<tr><th>CÓDIGO</th><th>CATEGORÍA</th></tr>";

    foreach ($categorias as $categoria) {
        $tabla .= "<tr><td>{$categoria->codigo}</td><td>{$categoria->nombre}</td></tr>";
    }

    $tabla .= "</table>";

    return $tabla;
});

Route::get('/medicamentos', function () {
    $medicamentos = json_decode(json_encode([
        ["codigo" => "A02BA02", "numero" => 1, "nombre" => "Ranitidina", "dosis" => "50 mg", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A02BA03", "numero" => 2, "nombre" => "Famotidina", "dosis" => "40 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A02BC01", "numero" => 3, "nombre" => "Omeprazol", "dosis" => "20 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A02BC01", "numero" => 4, "nombre" => "Omeprazol", "dosis" => "40 mg", "forma" => "Sólidos parenterales", "via" => "IV"],
        ["codigo" => "A03BA01", "numero" => 1, "nombre" => "Atropina (Sulfato)", "dosis" => "0.5-1 mg/mL", "forma" => "Líquidos parenterales", "via" => "SC/IM/IV"],
        ["codigo" => "A03BA03", "numero" => 2, "nombre" => "Hiosciamina (bromuro de n-butil hioscina)", "dosis" => "10 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A03BA03", "numero" => 3, "nombre" => "Hiosciamina (bromuro de n-butil hioscina)", "dosis" => "20 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A03FA01", "numero" => 4, "nombre" => "Metoclopramida (clorhidrato)", "dosis" => "5 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A03FA01", "numero" => 5, "nombre" => "Metoclopramida (clorhidrato)", "dosis" => "10 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA01", "numero" => 1, "nombre" => "Ondansetron", "dosis" => "8 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA01", "numero" => 2, "nombre" => "Ondansetron", "dosis" => "2 mg/mL", "forma" => "Líquidos parenterales", "via" => "IV"],
        ["codigo" => "A04AA02", "numero" => 3, "nombre" => "Granisetron", "dosis" => "1 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA02", "numero" => 4, "nombre" => "Granisetron", "dosis" => "1 mg/mL", "forma" => "Líquidos parenterales", "via" => "IV"],
        ["codigo" => "R06AA11", "numero" => 5, "nombre" => "Dimenhidrinato", "dosis" => "50 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "R06AA11", "numero" => 6, "nombre" => "Dimenhidrinato", "dosis" => "50 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
    ]));

    $tabla = "<table>";
    $tabla .= "<tr><th>Código</th><th>Nº</th><th>Nombre</th><th>Dosis</th><th>Forma farmacéutica</th><th>Vía de administración</th></tr>";

    foreach ($medicamentos as $medicamento) {
        $tabla .= "<tr><td>{$medicamento->codigo}</td><td>{$medicamento->numero}</td><td>{$medicamento->nombre}</td><td>{$medicamento->dosis}</td><td>{$medicamento->forma}</td><td>{$medicamento->via}</td></tr>";
    }

    $tabla .= "</table>";

    return $tabla;
});


//Ejercicio 1
Route::get('/clientes/vip', function(){
    //Creamos la lista de clientes
    $clientes = [
        (object) ['id'=> 1, 'nombre' => 'Karen Criollo', 'telefono' => '+503 6769-1673',
        'puntos_acumulados' => 15],
        (object) ['id'=> 2, 'nombre' => 'Melissa Ventura', 'telefono' => '+503 0099-1503',
        'puntos_acumulados' => 5],
        (object) ['id'=> 3, 'nombre' => 'Carlos Delgado', 'telefono' => '+503 3469-8603',
        'puntos_acumulados' => 25]
    ];

    // Creamos la tabla con los registros de los clientes de forma dinamica
    $html = '
        <table border = 1 cellspacing = 0>
            <thead>
                <tr>
                    <th>ID CLIENTE</th>
                    <th>NOMBRE</th>
                    <th>TELEFONO</th>
                    <th>PUNTOS ACUMULADOS</th>
                </tr>
            </thead>
            <tbody>
    ';
    foreach($clientes as $cliente) {
        $html .= "
            <tr>
                <td>$cliente->id</td>
                <td>$cliente->nombre</td>
                <td>$cliente->telefono</td>
                <td>$cliente->puntos_acumulados</td>
            </tr>
        ";
    }
    $html .= '
            </tbody>
        </table>
    ';

    //pintamos en la ventana del navegador la tabla
    echo $html;
});

//Ejercicio 2
Route::get('/proveedores/internacionales', function(){
    // Creamos la lista de proveedores
    $proveedores = [
        (object) ['empresa' => 'Bayer', 'pais_origen' => 'Alemania',
        'medicamento_principal' => 'Vick Vaporup', 'tiempo_entrega_dias' => 10],
        (object) ['empresa' => 'MediSupply Asia', 'pais_origen' => 'India',
        'medicamento_principal' => 'Paracetamol', 'tiempo_entrega_dias' => 20],
        (object) ['empresa' => 'Vijosa', 'pais_origen' => 'El Salvador',
        'medicamento_principal' => 'Ibuprofeno', 'tiempo_entrega_dias' => 7],
        (object) ['empresa' => 'GlobalMed USA', 'pais_origen' => 'Estados Unidos',
        'medicamento_principal' => 'Acetaminofen', 'tiempo_entrega_dias' => 18]
    ];

    // Creamos la tabla con los registros de los proveedores de forma dinamica
    $html = '
        <table border = 1 cellspacing = 0>
            <thead>
                <tr>
                    <th>EMPRESA</th>
                    <th>PAIS ORIGEN</th>
                    <th>MEDICAMENTO PRINCIPAL</th>
                    <th>TIEMPO DE ENTREGA</th>
                </tr>
            </thead>
            <tbody>
    ';
    foreach($proveedores as $proveedor) {
        // Validamos si el tiempo de entrega es critico
        $tiempo = $proveedor->tiempo_entrega_dias;
        if ($tiempo > 15) {
            $tiempo_entrega_final = "$tiempo dias (Demora Critica)";
        } else {
            $tiempo_entrega_final = "$tiempo dias";
        }

        $html .= "
            <tr>
                <td>$proveedor->empresa</td>
                <td>$proveedor->pais_origen</td>
                <td>$proveedor->medicamento_principal</td>
                <td>$tiempo_entrega_final</td>
            </tr>
        ";
    }
    $html .= '
            </tbody>
        </table>
    ';
    // Pintamos en la ventana del navegador la tabla
    echo $html;
});

//Ejercicio 3
Route::get('/lotes/inventario', function(){
    // Creamos la lista de lotes de la farmacia
    $lotes = [
        (object) ['codigo_lote' => '001', 'nombre_medicamento' => 'Insulina', 
        'cantidad_cajas' => 40, 'temperatura_requerida_celsius' => 4],
        (object) ['codigo_lote' => '002', 'nombre_medicamento' => 'Amoxicilina', 
        'cantidad_cajas' => 100, 'temperatura_requerida_celsius' => 20],
        (object) ['codigo_lote' => '003', 'nombre_medicamento' => 'Vacuna VPH', 
        'cantidad_cajas' => 25, 'temperatura_requerida_celsius' => 2],
        (object) ['codigo_lote' => '004', 'nombre_medicamento' => 'Paracetamol', 
        'cantidad_cajas' => 80, 'temperatura_requerida_celsius' => 22]
    ];

    // Creamos la tabla con los registros de los lotes de forma dinamica
    $html = '
        <table border = 1 cellspacing = 0>
            <thead>
                <tr>
                    <th>CODIGO LOTE</th>
                    <th>MEDICAMENTO</th>
                    <th>CANTIDAD CAJAS</th>
                    <th>TEMPERATURA REQUERIDA (Celsius)</th>
                </tr>
            </thead>
            <tbody>
    ';
    foreach($lotes as $lote) {
        // Validamos si el medicamento requiere cadena de frio
        $temperatura = $lote->temperatura_requerida_celsius;
        if ($temperatura <= 5) {
            $nombre_formateado = "$lote->nombre_medicamento (Requiere Cadena de Frio)";
        } else {
            $nombre_formateado = "$lote->nombre_medicamento";
        }

        $html .= "
            <tr>
                <td>$lote->codigo_lote</td>
                <td>$nombre_formateado</td>
                <td>$lote->cantidad_cajas</td>
                <td>$lote->temperatura_requerida_celsius</td>
            </tr>
        ";
    }
    $html .= '
            </tbody>
        </table>
    ';

    // Pintamos en la ventana del navegador la tabla
    echo $html;
});

require __DIR__.'/settings.php';
