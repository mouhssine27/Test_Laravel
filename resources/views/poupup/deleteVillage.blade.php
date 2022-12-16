<div class="modal fade" id="deleteVillage{{ $villageId }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Supression d'un village</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
            </div>
            <div class="modal-body">
               Vous voulez vraiment supprimer ce village ? <br>
            </div>
            <div class="modal-footer">
                <form  method="POST" action="{{ Route('deleteVillage',$villageId)}}">
                    @csrf
    
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="rest" class="btn btn-danger" style="background-color: red">Supprimer</button>
            </form>
            </div>
          </div>
    </div>
  </div>