@extends('app')

@section('title', 'Provinsi')

@section('content')

<table class="table table-bordered">
    <h1>Data Provinsi</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button>

    <!-- Modal -->
    <form action="provinsi/add" method="post">
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
                            <label class="form-label">Kode Provinsi</label>
                            <input type="text" class="form-control" name="kode" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Provinsi</label>
                            <input type="text" class="form-control" name="nama_provinsi" required>
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
        <th>Nama Provinsi</th>
        <th>Action</th>
    </tr>
    @foreach($provinsi as $Get)
    <tr>
        <td>{{ $Get->kode }}</td>
        <td>{{ $Get->nama_provinsi }}</td>
        <td>
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal"
                data-url="{{ route('provinsi.update',['id'=>$Get->id]) }}" data-kode="{{ $Get->kode }}"
                data-nama_provinsi="{{$Get->nama_provinsi}}">Update</button>
            |
            <a href="/provinsi/delete/{{ $Get->id }}" class="btn btn-danger">Delete</a>
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
        var html = `
            <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="${$(e.relatedTarget).data('url')}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Berita</label>
                <input type="text" name="kode" value="${$(e.relatedTarget).data('kode')}" class="form-control" id="exampleFormControlInput1"
                    placeholder="kode">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Berita</label>
                <input type="text" name="nama_provinsi" value="${$(e.relatedTarget).data('nama_provinsi')}" class="form-control" id="exampleFormControlInput1"
                    placeholder="nama_provinsi">
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