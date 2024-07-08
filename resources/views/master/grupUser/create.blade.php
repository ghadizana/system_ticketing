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
                    <div class="row g-2 mb-2">
                        <div class="col mb-0 text-start">
                            <label for="idGrupUser" class="form-label">Id Grup User</label>
                            <input type="number" id="idGrupUser" class="form-control" name="idGrupUser"
                                placeholder="Masukkan Id Grup User" required value="{{ old('idGrupUser') }}">
                        </div>
                        @error('idGrupUser')
                            <div class="text text-danger text-start">{{ $message }}</div>
                        @enderror
                        <div class="col mb-0 text-start">
                            <label for="grupUser" class="form-label text-start">Nama Grup User</label>
                            <input type="text" id="grupUser" class="form-control" name="grupUser"
                                placeholder="Masukkan Nama Grup User" autofocus required value="{{ old('grupUser') }}">
                        </div>
                        @error('grupUser')
                            <div class="text text-danger text-start">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="namaMenu" class="form-label text-start">Nama Akses Menu</label>
                        <select name="namaMenu" id="namaMenu" class="form-control" required>
                            @foreach ($aksesMenu as $item)
                                <option value="{{ $item->idAksesMenu }}"
                                    {{ old('idAksesMenu') == $item->idAksesMenu ? 'selected' : '' }}>
                                    {{ $item->deskripsi }}
                                </option>
                            @endforeach
                        </select>
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
