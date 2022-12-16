<div class="modal fade" id="editAgent{{ $userId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{  route('updateAgent', $userId) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="nomAgent" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username">identifiant</label>
                            <input type="text" class="form-control" placeholder="username" name="username" value="{{ $user->username }}">
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="emailAgent">Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="emailAgent" value="{{ $user->email }}">
                        </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="type">Role</label>
                            <select class="col form-control" id="role" name="roleAgent">  
                                <option value="0" selected>Agent</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="passwordAgent" placeholder="Password" value="{{$user->password }}">
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
