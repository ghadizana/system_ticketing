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
                                    placeholder="Masukkan username anda" autofocus required value="{{ old('username') }}"/>
                            </div>
                            @error('username')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 form-password-toggle">
                        <label class="col-sm-3 col-form-label text-start" for="password">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" autofocus required value="{{ old('password') }}" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="name">Nama</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="nama"
                                    placeholder="Masukkan nama anda" autofocus required value="{{ old('nama') }}" />
                            </div>
                            @error('nama')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="email">Email</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Masukkan email anda" autofocus required value="{{ old('email') }}" />
                            </div>
                            @error('email')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idProyek">Id Proyek</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idProyek"
                                    placeholder="Masukkan id proyek anda" autofocus required value="{{ old('idProyek') }}" />
                            </div>
                            @error('idProyek')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idKaryawan">Id Karyawan</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idKaryawan"
                                    placeholder="Masukkan id karyawan anda" autofocus required value="{{ old('idKaryawan') }}" />
                            </div>
                            @error('idKaryawan')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="grupUser">Grup User</label>
                        <div class="col-sm-9">
                            <select name="idGrupUser" name="idGrupUser" class="form-control">
                                <option value="" disabled selected>
                                    Pilih Menu</option>
                                @foreach ($grupUsers as $grupUser)
                                    <option value="{{ $grupUser->idGrupUser }}">
                                        {{ $grupUser->grupUser }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idGrupUser')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idDepartment">Id Department</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idDepartment"
                                    placeholder="Masukkan id department anda" autofocus required value="{{ old('idDepartment') }}" />
                            </div>
                            @error('idDepartment')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="formFile">Foto Pengguna</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="file" class="form-control" name="fotoPengguna" autofocus required />
                            </div>
                        </div>
                        @error('image')
                            <div class="text text-danger text-start">{{ $message }}</div>
                        @enderror
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
