@extends('app')

@section('title', 'Pegawai')

@section('content')

<table class="table table-bordered">
    <h1>Data Pegawai</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button>

    <!-- Modal -->
    <form action="pegawai/add" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama pegawai</label>
                            <input type="text" class="form-control" name="nama_pegawai" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" name="agama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>

                        <div class="mb-3">
                            <label for="kelurahan_id" class="form-label">Kelurahan</label>
                            <select class="form-select" id="kelurahan_id" name="kelurahan_id" required>
                                <option value="">Pilih Kelurahan</option>
                                <option value="1">Ujung Menteng</option>
                                <option value="2">Delambang</option>
                                <option value="3">Tipar</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan_id" class="form-label">Kecamatan</label>
                            <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                                <option value="">Pilih Kecamatan</option>
                                <option value="1">Cakung Barat</option>
                                <option value="2">Cakung Timur</option>
                                <option value="3">Pasir Panjang</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="provinsi_id" class="form-label">Kecamatan</label>
                            <select class="form-select" id="provinsi_id" name="provinsi_id" required>
                                <option value="">Pilih Provinsi</option>
                                <option value="1">Aceh</option>
                                <option value="2">DKI Jakarta</option>
                                <option value="3">Bali</option>

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <tr>
        <th>Nama pegawai</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Provinsi</th>
        <th>Action</th>
    </tr>
    @foreach($pegawai as $Get)
    <tr>

        <td>{{ $Get->nama_pegawai }}</td>
        <td>{{$Get->tempat_lahir}}</td>
        <td>{{$Get->tanggal_lahir}}</td>
        <td>{{$Get->jenis_kelamin}}</td>
        <td>{{$Get->agama}}</td>
        <td>{{$Get->alamat}}</td>
        <td>{{$Get->nama_kelurahan}}</td>
        <td>{{$Get->nama_kecamatan}}</td>
        <td>{{$Get->nama_provinsi}}</td>
        <td>
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal"
                data-url="{{ route('pegawai.update',['id'=>$Get->id]) }}" data-nama_pegawai="{{$Get->nama_pegawai}}"
                data-kecamatan_id="{{$Get->kecamatan_id}}" data-tempat_lahir="{{$Get->tempat_lahir}}"
                data-tgl="{{$Get->tanggal_lahir}}" data-jenis="{{$Get->jenis_kelamin}}" data-agama="{{$Get->agama}}"
                data-alamat="{{$Get->alamat}}" data-kelurahan_id="{{$Get->kelurahan_id}}"
                data-provinsi_id="{{$Get->provinsi_id}}">Update</button>
            |
            <a href="/pegawai/delete/{{ $Get->id }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script>
    $('#updateModal').on('shown.bs.modal', function(e) {
        var kecamatan_id = $(e.relatedTarget).data('kecamatan_id');
        var kelurahan_id = $(e.relatedTarget).data('kelurahan_id');
        var provinsi_id = $(e.relatedTarget).data('provinsi_id');
        var html = `
            <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="${$(e.relatedTarget).data('url')}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama pegawai</label>
                <input type="text" name="nama_pegawai" value="${$(e.relatedTarget).data('nama_pegawai')}" class="form-control" id="exampleFormControlInput1"
                placeholder="nama_pegawai">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">tempat_lahir</label>
                    <input type="text" name="tempat_lahir" value="${$(e.relatedTarget).data('tempat_lahir')}" class="form-control" id="exampleFormControlInput1"
                        placeholder="tempat_lahir">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="${$(e.relatedTarget).data('tgl')}" class="form-control" id="exampleFormControlInput1"
                        placeholder="tanggal">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">jenis_kelamin</label>
                    <input type="text" name="jenis_kelamin" value="${$(e.relatedTarget).data('jenis')}" class="form-control" id="exampleFormControlInput1"
                        placeholder="jenis_kelamin">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">agama</label>
                    <input type="text" name="agama" value="${$(e.relatedTarget).data('agama')}" class="form-control" id="exampleFormControlInput1"
                        placeholder="agama">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">alamat</label>
                    <input type="text" name="alamat" value="${$(e.relatedTarget).data('alamat')}" class="form-control" id="exampleFormControlInput1"
                        placeholder="alamat">
                </div>
            <div class="mb-3">
                <label for="kelurahan_id" class="form-label">kelurahan</label>
                <select class="form-select" id="kelurahan_id" name="kelurahan_id" required>
                    <option value="">Pilih kelurahan</option>
                    <option value="1" ${kelurahan_id==1 ? 'selected' : '' }>Ujung Menteng</option>
                    <option value="2" ${kelurahan_id==2 ? 'selected' : '' }>Delambang</option>
                    <option value="3" ${kelurahan_id==3 ? 'selected' : '' }>Tipar</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kecamatan_id" class="form-label">Kecamatan</label>
                <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                    <option value="">Pilih Kecamatan</option>
                    <option value="1" ${kecamatan_id==1 ? 'selected' : '' }>Cakung Timur</option>
                    <option value="2" ${kecamatan_id==2 ? 'selected' : '' }>Cakung Barat</option>
                    <option value="3" ${kecamatan_id==3 ? 'selected' : '' }>Pasir Panjang</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="provinsi_id" class="form-label">provinsi</label>
                <select class="form-select" id="provinsi_id" name="provinsi_id" required>
                    <option value="">Pilih provinsi</option>
                    <option value="1" ${provinsi_id==1 ? 'selected' : '' }>Aceh</option>
                    <option value="2" ${provinsi_id==2 ? 'selected' : '' }>DKI Jakarta</option>
                    <option value="3" ${provinsi_id==3 ? 'selected' : '' }>Bali</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>

`;

        $('#modal-content').html(html);

    });
</script>
@endsection