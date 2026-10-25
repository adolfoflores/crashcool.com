<?php
// Estadisticas de la portada: Hits, Hoy y Online
require_once __DIR__ . '/comun.php';

function cc_estadisticas($contar = true)
{
    $hoy = date('Y-m-d');
    $ahora = time();
    $visitante = md5(cc_ip());
    $inicial = array('hits' => 123326, 'dia' => $hoy, 'hoy' => 0, 'online' => array());

    $datos = cc_datos_actualizar('contador.dat', $inicial, function ($d) use ($hoy, $ahora, $visitante, $contar) {
        if ($d['dia'] != $hoy) {
            $d['dia'] = $hoy;
            $d['hoy'] = 0;
        }
        if ($contar) {
            $d['hits']++;
            $d['hoy']++;
        }
        $d['online'][$visitante] = $ahora;
        foreach ($d['online'] as $id => $visto) {
            if ($ahora - $visto > 300) unset($d['online'][$id]);
        }
        return $d;
    });

    return array('hits' => $datos['hits'], 'hoy' => $datos['hoy'], 'online' => count($datos['online']));
}
