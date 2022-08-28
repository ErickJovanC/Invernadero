<?php
namespace App\Repositories;

use App\Models\AplicacionFertilizante;
use App\Models\AplicacionPlaguicida;

class FinancialReportRepo
{
    /** Return Fertilers Report
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

    /** Return Plesticides Report
     * @param int $userId
     * @param mixed $dateStart
     * @param mixed $dateEnd
     * @return array
     */
    public static function getPesticideDate(int $userId, $dateStart, $dateEnd)
    {
        $pesticideApplication = AplicacionPlaguicida::where('user_id', $userId)
            ->whereBetween('fecha', [$dateStart, $dateEnd])
                ->orderBy('plaguicida_id', 'ASC')->get();

        $pes = [];
        foreach ($pesticideApplication as $key => $item) {
            $id = $item->fertilizante_id;

            if (!isset($pes[$id])) {
                $pes[$id]['name'] = $item->plaguicida->ingredienteActivo;
                $pes[$id]['count'] = 1;
                $pes[$id]['units'] = $item->unidades;
                $pes[$id]['totalPrice'] = $item->precio * $item->unidades;
                $pes[$id]['averagePrice'] = $item->precio;
            } else {
                $pes[$id]['count']++;
                $pes[$id]['units'] += $item->unidades;
                $pes[$id]['totalPrice'] += $item->precio * $item->unidades;
                $pes[$id]['averagePrice'] = $pes[$id]['totalPrice'] / $pes[$id]['units'];
            }
        }

        return $pes;
    }
}