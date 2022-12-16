<div class="modal fade" id="addParcelle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Parcelle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{  route('storeParcelles') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Numéro</label>
                            <input type="text" class="form-control" placeholder="Numéro" name="numero">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ville">Nom du village</label>
                            <select class="col form-control" id="ville" name="village">
                                @foreach ($villages as $village )
                                <option value="{{ $village->id }}">{{ $village->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Numéro d'identité propriétaire</label>
                            <select class="col form-control" id="disabledSelect" name="proprietaire">
                                @foreach ( $proprietaires as $proprietaire )
                                <option value="{{ $proprietaire->id }}">{{ $proprietaire->numero_identite  }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Date d'élimitation</label>
                            <input type="date" class="form-control" placeholder="Date d'élimitation" name="dateElimitation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signature">Signature</label>
                        <textarea name="signature" class="form-control" id="signature" rows="3"></textarea>
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
