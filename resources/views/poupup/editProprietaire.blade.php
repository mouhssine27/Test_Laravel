<div class="modal fade" id="editProprietaire{{ $proprietaireId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Proprietaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{  route('updateProprietaire',$proprietaireId) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" value="{{ $proprietaire->nom }}" placeholder="Nom" name="nom">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control"  value="{{ $proprietaire->prenom }}" placeholder="prenom" name="prenom">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6 mt-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio"@if($proprietaire->sexe=='homme') checked @endif value="homme" id="customRadioInline1" name="gendre"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">Homme</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" @if($proprietaire->sexe=='femmes') checked @endif value="femme" id="customRadioInline2" name="gendre"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">femme</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nationalite">Nationalité</label>
                            <input type="text" class="form-control" placeholder="Nationalité" value="{{ $proprietaire->nationalite }}" name="nationalite">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="type">Type d'identité</label>
                            <select class="col form-control" id="type" name="typeIdentite">
                                <option>CIN</option>
                                <option>PASSPORT</option>
                                <option>PERMIS</option>
                                <option>CARTE DE RÉSEDENCE</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="numdident">Numéro d'identité</label>
                            <input type="text" class="form-control" value="{{ $proprietaire->numero_identite }}" placeholder="Numéro" id="numdident" name="numIdentite">
                        </div>

                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="file">Photo de la piéce d'identité</label>
                            <input type="file" class="form-control-file" id="file" name="photoIdentite">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adresse">Adresse</label>
                            <textarea class="form-control" id="adresse" rows="3" name="adresse">{{ $proprietaire->adresse}} </textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
