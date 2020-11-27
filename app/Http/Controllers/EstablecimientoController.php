<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establecimiento;
class EstablecimientoController extends Controller

{
    public function  index() {
        return view('consulta');
    }  //

    ## AJAX REQUES
    public function getEstablecimiento(Request $request){

        $search = $request->search;

        if($search == ''){
           $establecimientos = Establecimiento::orderby('establecimiento','asc')->select('id','establecimiento')->limit(5)->get();
        }else{
           $establecimientos = Establecimiento::orderby('establecimiento','asc')->select('id','establecimiento')->where('establecimiento', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($establecimientos as $establecimiento){
           $response[] = array(
                "id"=>$establecimiento->id,
                "text"=>$establecimiento->establecimiento
           );
        }

        echo json_encode($response);
        exit;
     }
}
