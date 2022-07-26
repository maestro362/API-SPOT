<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Data;


class ConstructionController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function GetInfo($zip_code,$type)
    {
        try 
        {
            $construction_type = request()->query('construction_type');
            if (!$construction_type) return 'Se necesita un tipo de construccion';
            switch ($construction_type) 
            {
                case 1:
                    $construction_type = "Áreas verdes";
                    break;

                case 2:
                    $construction_type = "Centro de barrio";
                    break;

                case 3:
                    $construction_type = "Equipamiento";
                    break;

                case 4:
                    $construction_type = "Habitacional";
                    break;

                case 5:
                    $construction_type = "Habitacional y comercial";
                    break;

                case 6:
                    $construction_type = "Industrial";
                    break;

                case 7:
                    $construction_type = "Sin Zonificación";
                    break;
                
                default:
                    return 'No se reconoce el construction_type: ' . $construction_type;
                    break;
            }

            $records = Data::select('*',DB::raw('(superficie_terreno / valor_suelo - subsidio) as price_unit, (superficie_construccion / valor_suelo - subsidio) as price_unit_construction'))->where('codigo_postal', $zip_code)->where('uso_construccion',$construction_type)->get();
            
            if(!count($records)) return 'No se encontraron registros con el codigo postal: ' . $zip_code . ' y tipo de contruccion: ' . $construction_type;

            $elements = $records->count();

            switch ($type) 
            {
                case 'max':
                    $price_unit = $records->max('price_unit');
                    $price_unit_construction = $records->max('price_unit_construction');
                    break;

                case 'min':
                    $price_unit = $records->min('price_unit');
                    $price_unit_construction = $records->min('price_unit_construction');
                    break;

                case 'avg':
                    $price_unit = $records->avg('price_unit');
                    $price_unit_construction = $records->avg('price_unit_construction');
                    break;
                
                default:
                    return 'No se reconoce el tipo de operacion: ' . $type;
                    break;
            }
            
            $response = array('status' => true, 'payload' => array('type' => $type, 'price_unit' => $price_unit, 'price_unit_construction' => $price_unit_construction, 'elements' => $elements));

            return json_encode($response);
            
        } catch (\Exception $e) {
            $response = json_encode(array('status' => false, 'payload' => array('error' => $e->getMessage())));
        }
        
    }

}
