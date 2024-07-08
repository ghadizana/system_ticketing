    <div class="modal fade" id="addAksesMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formAddAksesMenu" class="mb-3" action="{{ route('addAksesMenu') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Akses Menu</h5>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-2 text-start">
                            <label for="idAksesMenu" class="form-label">Id Akses Menu</label>
                            <input type="number" id="idAksesMenu" class="form-control" name="idAksesMenu"
                                placeholder="Masukkan Id Akses Menu" autofocus required value="{{ old('idAksesMenu') }}">
                            @error('idAksesMenu')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-2 text-start">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" id="deskripsi" class="form-control" name="deskripsi"
                                placeholder="Masukkan Deskripsi" autofocus required value="{{ old('deskripsi') }}">
                            @error('deskripsi')
                            <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-2 text-start">
                            <label for="idMenu" class="form-label">Nama Menu</label>
                            <select name="idMenu" id="idMenu" class="form-control" autofocus required>
                                <option value="" disabled selected>
                                    Pilih Menu</option>
                                @foreach ($menu as $item)
                                    <option value="{{ $item->idMenu }}">
                                        {{ $item->namaMenu }}
                                    </option>
                                @endforeach
                            </select>
                            @error('namaMenu')
                                
                            @enderror
                        </div>
                        <div class="col mb-2 text-start">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" id="label" class="form-control" name="label"
                                placeholder="Masukkan Label" autofocus required value="{{ old('label') }}">
                            @error('label')
                                <div class="text text-danger text-start"></div>
                            @enderror
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
