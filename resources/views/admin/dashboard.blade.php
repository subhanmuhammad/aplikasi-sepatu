@extends('admin.layouts-admin.index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">MANAGEMENT BANNER</h3>
        </div>
        <div class="card-body">
            <form class="striped-rows" enctype="multipart/form-data" action="/banner/store" method="POST">
                @method('GET')
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama_banner" type="text" class="form-control" placeholder="Masukkan Nama Sepatu"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input name="gambar" type="file" class="form-control" id="gambar " required>
                        </div>
                    </div>
                </div>
                <hr>
                <input class="btn btn-success" type="submit" type="submit" value="Simpan">
                {{-- <button class="btn btn-success" type="submit">Simpan</button> --}}
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Slider</h3>
        </div>
        <div class="card-body">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($baner as $item)
                        <tr class="table-active">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/img/banner/' . $item->id . '/gambar/1280x720/' . $item->gambar) }}"
                                    alt="" width="100px">
                            </td>
                            <td>
                                <form class="d-inline" action="/banner/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa-regular fas fa-trash"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
