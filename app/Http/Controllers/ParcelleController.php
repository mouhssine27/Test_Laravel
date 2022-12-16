<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParcelleRequest;
use App\Http\Requests\UpdateParcelleRequest;
use App\Parcelle;
use App\Proprietaire;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParcelleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function index()
    {
        $villages= Village::all();
        $proprietaires= Proprietaire::all();
        $parcelles =Parcelle::all();   
        return view('Parcelles',compact('villages','proprietaires','parcelles'));
    }

    public function store(StoreParcelleRequest $request){
        $idUser = Auth::id();
        $data= $request->all();
        Parcelle::create(
            [
            'user_id'=> $idUser,
            'proprietaire_id' => $data['proprietaire'],
            'village_id' => $data['village'],
            'numero' => $data['numero'],
            'date_delimitation' => $data['dateElimitation'],
            'signature'=>$data['signature']
            ]);

            return redirect()->back()->with('success', 'Le Parcelle à éte crée avec success');
    }


    public function filtreParcelle(Request $request){
        $villages= Village::all();
        $proprietaires= Proprietaire::all();
        $parcelles = Parcelle::orderby('numero','desc')
        ->join('users','users.id', '=', 'parcelles.user_id');
        
        if($request['numero']!=""){
            $parcelles->where('numero',$request['numero']);
        }
        if($request['agent']!=""){
            $parcelles->where('users.name',$request['agent']);
        }

        $parcelles= $parcelles ->get();

        $filter = [
            'numero' => $request['numero'],
            'agent' => $request['agent'],
            // 'numero_identite' => $request['numIdentite'],
            
        ];
        $data = [
            'parcelles'=>$parcelles,
            'filter' => $filter,
            'villages'=>$villages,
            'proprietaires'=>$proprietaires,
        ];
        return view('Parcelles', $data);
        // return view('Parcelles', $data); 
    }

    public function update(UpdateParcelleRequest $request, $parcelleId){
        $idUser = Auth::id();
        $data= $request->all();       
        $parcelle = Parcelle::find($parcelleId);
        $parcelle->user_id = $idUser;   
        $parcelle->proprietaire_id = $data['proprietaire'];
        $parcelle->village_id = $data['village'];
        $parcelle->numero = $data['numero'];
        $parcelle->date_delimitation=$data['dateElimitation'];
        $parcelle->signature = $data['signature'];
        $parcelle->save();

        return redirect()->back()->with('success', 'Le Parcelle à éte modifié avec success');
    }
    public function destroy($parcelleId)
    {
        // return $parcelleId;

        $parcelle= Parcelle::find($parcelleId);
        $parcelle->delete();

        return redirect()->back()->with('success', 'Le Parcelle à éte supprimé avec success');
    }

    public function wordExports($id){
        $idUser = Auth::id();
        $parcelle = Parcelle::findOrFail($id);
        // $templateProcessor = new TemplateProcessor(documentTemplate: 'word-template/parcelle.docx');
        // $templateProcessor->setValue(search:'proprietaire_id',$parcelle->numero);
    }
}
