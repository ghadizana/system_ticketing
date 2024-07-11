<div class="modal fade" id="addAksesMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="formAddAksesMenu" class="mb-3" action="{{ route('addAksesMenu') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Akses Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-2 text-start">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" id="deskripsi" class="form-control" name="deskripsi"
                                placeholder="Masukkan Deskripsi" autofocus required value="{{ old('deskripsi') }}">
                            @error('deskripsi')
                                <div class="text text-danger text-start">{{ $message }}</div>
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
                    <div class="row g-2">
                        <div class="col mb-2 text-start">
                            <label for="idMenu" class="form-label">Nama Menu</label>
                            <div class="border p-2" id="menuDropdown" style="background: white; border-radius: .25rem;">
                                <ul class="list-unstyled" style="max-height: 200px; overflow-y: auto;">
                                    @foreach ($menu as $item)
                                        <li>
                                            <label>
                                                <input type="checkbox" name="idMenu[]" value="{{ $item->idMenu }}"
                                                    class="menu-checkbox" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $item->idMenu }}"class="menu-checkbox">
                                                {{ $item->namaMenu }}
                                                <i class="bx bx-chevron-down me-2 chevron-icon"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $item->idMenu }}"></i>
                                            </label>
                                            <div class="collapse" id="collapse{{ $item->idMenu }}">
                                                <ul class="list-unstyled ms-3">
                                                    <li>
                                                        <label>
                                                            <input type="checkbox"
                                                                name="subMenu[{{ $item->idMenu }}][]" value="create">
                                                            Create
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox"
                                                                name="subMenu[{{ $item->idMenu }}][]" value="read">
                                                            Read
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox"
                                                                name="subMenu[{{ $item->idMenu }}][]" value="update">
                                                            Update
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox"
                                                                name="subMenu[{{ $item->idMenu }}][]" value="delete">
                                                            Delete
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
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
