<?php
namespace App\Repositories;

use App\Models\AplicacionFertilizante;

class FinancialReportRepo
{
    /**
     * @param int $userId
     * @param string $fechaInicial
     * @param string $fechaFinal
     * @return array
     */
    public static function getFertilizantesFecha(int $userId, $fechaInicial, $fechaFinal)
    {
        $fertilizantes = AplicacionFertilizante::where('user_id', $userId)
            ->whereBetween('fechaAplicacion', [$fechaInicial, $fechaFinal])
            ->orderBy('fertilizante_id', 'ASC')->get();

        $fer = [];
        foreach ($fertilizantes as $key => $item) {
            $id = $item->fertilizante_id;

            if (!isset($fer[$id])) {
                $fer[$id]['nombre'] = $item->fertilizante->nombreFertilizante;
                $fer[$id]['contador'] = 1;
                $fer[$id]['unidades'] = $item->unidades;
                $fer[$id]['precioTotal'] = $item->precio * $item->unidades;
                $fer[$id]['precioPromedio'] = $item->precio;
            } else {
                $fer[$id]['contador']++;
                $fer[$id]['unidades'] += $item->unidades;
                $fer[$id]['precioTotal'] += $item->precio * $item->unidades;
                $fer[$id]['precioPromedio'] = $fer[$id]['precioTotal'] / $fer[$id]['unidades'];
            }
        }

        return $fer;
    }
}