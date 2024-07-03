<div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formAddMenu" class="mb-3" action="{{ route('addMenu') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="idMenu" class="form-label">Id Menu</label>
                            <input type="number" id="idMenu" class="form-control" name="idMenu"
                                placeholder="Masukkan Id Menu">
                        </div>
                        <div class="col mb-0">
                            <label for="namaMenu" class="form-label">Nama Menu</label>
                            <input type="text" id="namaMenu" class="form-control" name="namaMenu"
                                placeholder="Masukkan Nama Menu">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="linkTautan" class="form-label">Link Tautan</label>
                            <input type="link" id="baseUrl" class="form-control" name="baseUrl"
                                placeholder="Masukkan Link Tautan">
                        </div>
                        <div class="col mb-0">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" id="label" class="form-control" name="label"
                                placeholder="Masukkan Label">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
