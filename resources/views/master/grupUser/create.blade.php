<div class="modal fade" id="addGrupUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formAddGrupUser" class="mb-3" action="{{ route('addGrupUser') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Grup User</h5>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0 text-start">
                            <label for="idGrupUser" class="form-label">Id Grup User</label>
                            <input type="number" id="idGrupUser" class="form-control" name="idGrupUser"
                                placeholder="Masukkan Id Grup User">
                        </div>
                        <div class="col mb-0 text-start">
                            <label for="grupUser" class="form-label text-start">Nama Grup User</label>
                            <input type="text" id="grupUser" class="form-control" name="grupUser"
                                placeholder="Masukkan Nama Grup User">
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Akses Menu</label>
                            <input type="text" id="idAksesMenu" class="form-control" name="idAksesMenu"
                                placeholder="Masukkan Akses Menu yang Diberikan">
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
