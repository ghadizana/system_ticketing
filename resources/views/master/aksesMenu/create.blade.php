<div class="modal fade" id="addAksesMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formAddGrupUser" class="mb-3" action="{{ route('addAksesMenu') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Akses Menu</h5>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="idAksesMenu" class="form-label">Id Akses Menu</label>
                            <input type="number" id="idAksesMenu" class="form-control" name="idAksesMenu"
                                placeholder="Masukkan Id Akses Menu">
                        </div>
                        <div class="col mb-0">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" id="deskripsi" class="form-control" name="deskripsi"
                                placeholder="Masukkan Deskripsi">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="idAksesMenu" class="form-label">Id Akses Menu</label>
                            <select name="idAksesMenu" id="idAksesMenu" class="form-control" required>
                                @foreach ($menu as $item)
                                    <option value="{{ $item->idMenu }}"
                                        {{ old('idMenu') == $item->idMenu ? 'selected' : '' }}>
                                        {{ $item->namaMenu }}
                                    </option>
                                @endforeach
                            </select>
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
