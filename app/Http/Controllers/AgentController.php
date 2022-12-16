<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Parcelle;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     
        $users= user::all();   
        $parcelle= Parcelle::all();
        

        // $cumele = DB::table('users')
        // ->join('parcelles','parcelles.user_id', '=', 'users.id')
        // // ->where('restaurateurs.id',$idRestaurateur )
        // ->get();
        // return $cumele;
        return view('agents',compact('users'));
    }
    public function store(StoreAgentRequest $request)
    {
        $data= $request->all();
        User::create(
            [
            'name'=>$data['nomAgent'],
            'username' => $data['username'],
            'email' => $data['emailAgent'],
            'role' => $data['roleAgent'],
            'password' => Hash::make($data['passwordAgent']),
            ]);
            return redirect()->back()->with('success', 'Agent à éte crée avec success');
        
    }
    public function filtreAgent(Request $request){
        $users = User::orderby('name','desc');
        if($request['username']!=""){
            $users->where('username',$request['username']);
        }
       
        
        $users= $users ->get();

        $filter = [
            'username' => $request['username'],
         
        ];
        $data = [
            'users'=>$users,
            'filter' => $filter,
    
        ];

        return view('agents', $data); 
    }

    public function update(UpdateAgentRequest $request, $userId){

        $data= $request->all();       
        $user = User::find($userId); 
        $user->name = $data['nomAgent'];
        $user->username = $data['username'];
        $user->email = $data['emailAgent'];
        $user->role=$data['roleAgent'];
        $user->password = Hash::make($data['passwordAgent']);
        $user->save();
        

        return redirect()->back()->with('success', 'Agent à éte modifié avec success');
    }

    public function destroy($userId)
    {

        $user= User::find($userId);
        $user->delete();

        return redirect()->back()->with('success', "L'agent à éte supprimé avec success");
    }



}
