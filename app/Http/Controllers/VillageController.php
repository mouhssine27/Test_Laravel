<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVillageRequest;
use App\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $villages = Village::all();
        return view('Villages',compact('villages'));
    }

    public function store(StoreVillageRequest $request){

        $data= $request->all();
        Village::create(
            [
            'nom' => $data['nomVillage'],
            ]);

            return redirect()->back()->with('success', 'Le village à éte crée avec success');
    }

    public function filtreVillage(Request $request){
        $villages = Village::orderby('nom','desc');
        if($request['nom']!=""){
            $villages->where('nom',$request['nom']);
        }
       
        
        $villages= $villages ->get();

        $filter = [
            'nom' => $request['nom'],
         
        ];
        $data = [
            'villages'=>$villages,
            'filter' => $filter,
    
        ];

        return view('Villages', $data); 
    }

    public function update(StoreVillageRequest $request ,  $villageId){
        $data= $request->all();       
        $village = Village::find($villageId);
        $village->nom = $data['nomVillage'];   
        $village->save();
        return redirect()->back()->with('success', 'Le village à éte Modifier avec success');
    }
    public function destroy($villageId)
    {

        $Village= Village::find($villageId);
        $Village->delete();

        return redirect()->back()->with('success', 'Le Village à éte supprimé avec success');
    }


}
