@extends('app')

@section('title', 'Kelurahan')

@section('content')

<table class="table table-bordered">
    <h1>Data Kelurahan</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button>

    <!-- Modal -->
    <form action="kelurahan/add" method="post">
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
                            <label class="form-label">Kode kelurahan</label>
                            <input type="text" class="form-control" name="kode" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama kelurahan</label>
                            <input type="text" class="form-control" name="nama_kelurahan" required>
                        </div>

                        <div class="mb-3">
                            <label for="kecamatan_id" class="form-label">Kecamatan</label>
                            <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>

                                <option value="">Pilih Kecamatan</option>
                                @foreach($kecamatan as $Get)
                                <option value="{{$Get->id}}">{{$Get->nama_kecamatan}}</option>
                                @endforeach

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
        <th>Kode</th>
        <th>Nama kelurahan</th>
        <th>Kecamatan</th>
        <th>Action</th>
    </tr>
    @foreach($kelurahan as $Get)
    <tr>
        <td>{{ $Get->kode }}</td>
        <td>{{ $Get->nama_kelurahan }}</td>
        <td>{{$Get->nama_kecamatan}}</td>
        <td>
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal"
                data-url="{{ route('kelurahan.update',['id'=>$Get->id]) }}" data-kode="{{ $Get->kode }}"
                data-nama_kelurahan="{{$Get->nama_kelurahan}}"
                data-kecamatan_id="{{$Get->kecamatan_id}}">Update</button>
            |
            <a href="/kelurahan/delete/{{ $Get->id }}" class="btn btn-danger">Delete</a>
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
        var html = `
            <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="${$(e.relatedTarget).data('url')}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kode</label>
                <input type="text" name="kode" value="${$(e.relatedTarget).data('kode')}" class="form-control" id="exampleFormControlInput1"
                    placeholder="kode">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Kelurahan</label>
                <input type="text" name="nama_kelurahan" value="${$(e.relatedTarget).data('nama_kelurahan')}" class="form-control" id="exampleFormControlInput1"
                    placeholder="nama_kelurahan">
            </div>
            <div class="mb-3">
                <label for="kecamatan_id" class="form-label">Complaint Categories</label>
                <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                    <option value="">Select categories...</option>
                    <option value="1" ${kecamatan_id==1 ? 'selected' : '' }>Cakung Timur</option>
                    <option value="2" ${kecamatan_id==2 ? 'selected' : '' }>Cakung Barat</option>
                    <option value="3" ${kecamatan_id==3 ? 'selected' : '' }>Pasir Panjang</option>
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