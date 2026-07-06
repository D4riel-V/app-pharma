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

require __DIR__.'/settings.php';
