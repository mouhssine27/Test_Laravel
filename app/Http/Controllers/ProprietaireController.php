<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProprietaireRequest;
use App\Http\Requests\UpdateProprietaireRequest;
use App\Photos_identite;
use App\Proprietaire;
use Illuminate\Http\Request;

class ProprietaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proprietaires = Proprietaire::all();
        return view('Proprietaire',compact('proprietaires'));
    }

    public function store(StoreProprietaireRequest $request){
    
        $data= $request->all();
    
         $proprietaire = Proprietaire::create(
                    [
                    'nom' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'sexe' => $data['gendre'],
                    'nationalite' => $data['nationalite'],
                    'type_identite' => $data['typeIdentite'],
                    'numero_identite' => $data['numIdentite'],
                    'adresse' => $data['adresse'],
                    ]);
                    // return $proprietaire ;
        $idProprietaire =  $proprietaire->id;      
        $imagePath = $request->file('photoIdentite');
        $imageName = time() . '.' .$imagePath->getClientOriginalExtension();
        $imagePath ->move('photoProprietaire', $imageName );
                  $photo =  Photos_identite::create([
                        'src' => $imageName,
                        'proprietaire_id'=> $idProprietaire
                    ]);   
        return redirect()->back()->with('success', 'Le propriétaire à éte crée avec success');   
    }

    public function filtreProprietaire(Request $request){
        $proprietaires = Proprietaire::orderby('nom','desc');
        if($request['nom']!=""){
            $proprietaires->where('nom',$request['nom']);
        }
        if($request['prenom']!=""){
            $proprietaires->where('prenom',$request['prenom']);
        }
        if($request['numIdentite']!=""){
            $proprietaires->where('numero_identite',$request['numIdentite']);
        }
        
        $proprietaires= $proprietaires ->get();

        $filter = [
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'numero_identite' => $request['numIdentite'],
            
        ];
        $data = [
    

            'proprietaires'=>$proprietaires,
            'filter' => $filter,
    
        ];

        return view('Proprietaire', $data); 
    }


    public function update(UpdateProprietaireRequest $request ,$proprietaireId){
        $data= $request->all();       
        $proprietaires = Proprietaire::find($proprietaireId);
        $proprietaires->nom = $data['nom'];   
        $proprietaires->prenom =  $data['prenom'];
        $proprietaires->sexe = $data['nationalite'];
        $proprietaires->type_identite = $data['typeIdentite'];
        $proprietaires->numero_identite=$data['numIdentite'];
        $proprietaires->adresse = $data['adresse'];
        $proprietaires->save();
        $imagePath = $request->file('photoIdentite');
        if (isset($imagePath))
        {
            $imageName = time() . '.' .$imagePath->getClientOriginalExtension();
            $imagePath ->move('photoProprietaire', $imageName );
            $photo = Photos_identite::find($proprietaireId);
            $photo->src = $imageName;   
            $photo->proprietaire_id = $proprietaireId;
            $photo->save();
        }
        else {
            $photo = Photos_identite::find($proprietaireId);
            $photo->proprietaire_id = $proprietaireId;
            $photo->save();
        }
        return redirect()->back()->with('success', 'Le propriétaire à éte modifier avec success');
    }
    public function destroy($proprietaireId)
    {

        $Proprietaire= Proprietaire::find($proprietaireId);
        $Proprietaire->delete();

        return redirect()->back()->with('success', 'Le Proprietaire à éte supprimé avec success');
    }
}
