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
            <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#addAgent">Ajouter</button>
        </div>
        

          @include('poupup.addAgent')
        <div class="widget-content widget-content-area br-6">
            <form method="get" action="{{ route('filtreAgent') }}">
                <div class="d-flex justify-content-between my-5">
                    <div>
                        <input type="text" @if(isset($filter['username'] )) value="{{ $filter['username'] }}"@endif class="w-100 form-control product-search br-30" name="username"  placeholder="Nom" >
                    </div>
                    <button type="submit" class="btn btn-warning mb-2 mr-2 btn-rounded">Search <svg> ... </svg></button>
                </div>
            </form>
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
             
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Identifiant</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Nbr de parcelles</th>
                        <th class="no-content">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $users as $user )
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        @if($user->role == 0)
                        <td>agent</td>
                        @else
                        <td>admin</td>
                        @endif
                        <td>
                          5
                        </td>
                        <td>
                            <a  data-toggle="modal"data-target="#editAgent{{ $user->id }}"><i style="font-size: 20px" class="fa fa-pencil-square-o"></i></a>
                            <a data-toggle="modal"data-target="#deleteAgent{{$user->id}}"><i style="font-size: 20px" class="fa fa-trash-o"></i></a>
                        </td>
                        {{-- <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></td> --}}
                    </tr>
                    @include('poupup.editAgent',['userId'=>$user->id])
                    @include('poupup.deleteAgent',["userId"=>$user->id])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection