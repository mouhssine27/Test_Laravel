@extends('layouts.masterDashboard')

@section('content')

<div class="row layout-top-spacing" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Success !</strong> {{ session('success') }}
        </div>
        @endif

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal"
                data-target="#addParcelle">Ajouter</button>
        </div>
     

        @include('poupup.addParcelles',['villages'=>$villages ,'proprietaires'=>$proprietaires])

        <div class="widget-content widget-content-area br-6">
            <form method="get" action="{{ route('filtreParcelle')}}">
                <div class="d-flex justify-content-between my-5">
                    <div>
                        <input type="text" @if(isset($filter['numero'] )) value="{{ $filter['numero'] }}" @endif
                            class="w-100 form-control product-search br-30" name="numero" id="input-search"
                            placeholder="Numero">
                    </div>
                    <div>
                        <input type="text" @if(isset($filter['agent'] )) value="{{ $filter['agent'] }}" @endif
                            class="w-100 form-control product-search br-30" name="agent" id="input-search"
                            placeholder="Agent">
                    </div>
                    <button type="submit" class="btn btn-warning mb-2 mr-2 btn-rounded">Search <svg> ... </svg></button>
                </div>
            </form>
            <table id="zero-config" class="table dt-table-hover" style="width:100%">

                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Propriétaire</th>
                        <th>Villages</th>
                        <th>Date de délimitation</th>
                        <th>Agent</th>
                        @if (Auth::guard()->user()->role==1)
                        <th class="no-content">Actions</th>
                        @endif
                        <th> Demande d'imatriculation</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($parcelles as $parcelle)
                    <tr>
                        <td>{{ $parcelle->numero }}</td>
                        <td>{{ $parcelle->proprietaire->nom }}</td>
                        <td>{{ $parcelle->village->nom }}</td>
                        <td>{{ $parcelle->date_delimitation }}</td>
                        <td>{{ $parcelle->user->name }}</td>
                        
                        @if (Auth::guard()->user()->role==1)
                        <td>
                            <a  data-toggle="modal"data-target="#editParcelle{{ $parcelle->id }}"><i style="font-size: 20px" class="fa fa-pencil-square-o"></i></a>
                            <a data-toggle="modal"data-target="#deleteParcelle{{ $parcelle->id }}"><i style="font-size: 20px" class="fa fa-trash-o"></i></a>
                        </td>
                        @endif
                        
                        <td><a href="{{ url('word-export/'.$parcelle->id) }}" class="btn btn-primary mb-2">Telecharger</a></td>
                    </tr>
                      @include('poupup.editParcelle',["parcelle"=>$parcelle,"parcelleNum"=>$parcelle->numero,"parcelleId"=>$parcelle->id ,"parcelleVillage"=>$parcelle->village_id, "parcelleProprietaireId"=>$parcelle->proprietaire_id,"parcelleDateIlimitation"=>$parcelle->date_delimitation, "parcelleSignature"=>$parcelle->signature])
                      @include('poupup.deleteParcelle',["parcelleId"=>$parcelle->id])
                    @endforeach
                </tbody>
            </table>
          
            
                
        </div>
    </div>


</div>
@endsection
