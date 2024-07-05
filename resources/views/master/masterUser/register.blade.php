<div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAuthentication" class="mb-3" action="{{ route('addUser') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="username">Username</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="username"
                                    placeholder="Masukkan username anda" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 form-password-toggle">
                        <label class="col-sm-3 col-form-label text-start" for="password">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="name">Nama</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="nama"
                                    placeholder="Masukkan nama anda" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="email">Email</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Masukkan email anda" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idProyek">Id Proyek</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idProyek"
                                    placeholder="Masukkan id proyek anda" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idKaryawan">Id Karyawan</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idKaryawan"
                                    placeholder="Masukkan id karyawan anda" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="grupUser">Grup User</label>
                        <div class="col-sm-9">
                            <select name="idGrupUser" name="idGrupUser" class="form-control" required>
                                @foreach ($grupUsers as $grupUser)
                                    <option value="{{ $grupUser->idGrupUser }}"
                                        {{ old('idGrupUser') == $grupUser->grupUser ? 'selected' : '' }}>
                                        {{ $grupUser->grupUser }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idDepartment">Id Department</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idDepartment"
                                    placeholder="Masukkan id department anda" autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="formFile">Foto Pengguna</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="file" class="form-control" name="fotoPengguna" autofocus />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>
