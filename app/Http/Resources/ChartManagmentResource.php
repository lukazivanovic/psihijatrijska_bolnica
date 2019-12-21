<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\HelpFuncResource;

class ChartManagmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public static function saveTreatmant($pom,$request)
    {
        $pom->datum=$request->datum;
        $pom->id_pacijent=$request->id_pacijent;
        $pom->id_lekar=$request->id_lekar;
        $pom->id_bolest=HelpFuncResource::getIdBolesti($request->sifra_bolesti);
        if($pom->id_bolest=="") return redirect('/lekar/chart/'.$request->id_pacijent);
        $id_cure=HelpFuncResource::getIdLeka($request->sifra_leka);
        if($id_cure=="") return redirect('/lekar/chart/'.$request->id_pacijent);
        $pom->id_lek=$id_cure;
        if($request->lek_prepisana_kol<=0) return redirect('/lekar/chart/'.$request->id_pacijent);
        $pom->lek_prepisana_kol=$request->lek_prepisana_kol;
        HelpFuncResource::changeCure($id_cure,-$request->lek_prepisana_kol);
        $pom->dijagnoza=$request->dijagnoza;
        $pom->terapija=$request->terapija;
        $pom->prva_poseta=$request->prva_poseta;


        if(HelpFuncResource::checkIfHeIsMyDoctor($request->id_pacijent))
        {
            $pom->saveOrFail();   
            // if(isset($request->json)) return json_encode("Snimljeno");      
        }  

        // if(!isset($request->json)) 
        return redirect('/lekar/chart/'.$request->id_pacijent);  
    }
}
