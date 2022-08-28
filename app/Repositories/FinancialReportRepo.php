<?php
namespace App\Repositories;

use App\Models\AplicacionFertilizante;

class FinancialReportRepo
{
    /**
     * @param int $userId
     * @param string $dateStart
     * @param string $dateEnd
     * @return array
     */
    public static function getFertilizersDate(int $userId, $dateStart, $dateEnd)
    {
        $fertilizerApplication = AplicacionFertilizante::where('user_id', $userId)
            ->whereBetween('fechaAplicacion', [$dateStart, $dateEnd])
            ->orderBy('fertilizante_id', 'ASC')->get();

        $fer = [];
        foreach ($fertilizerApplication as $key => $item) {
            $id = $item->fertilizante_id;

            if (!isset($fer[$id])) {
                $fer[$id]['name'] = $item->fertilizante->nombreFertilizante;
                $fer[$id]['count'] = 1;
                $fer[$id]['units'] = $item->unidades;
                $fer[$id]['totalPrice'] = $item->precio * $item->unidades;
                $fer[$id]['averagePrice'] = $item->precio;
            } else {
                $fer[$id]['count']++;
                $fer[$id]['units'] += $item->unidades;
                $fer[$id]['totalPrice'] += $item->precio * $item->unidades;
                $fer[$id]['averagePrice'] = $fer[$id]['totalPrice'] / $fer[$id]['units'];
            }
        }

        return $fer;
    }
}