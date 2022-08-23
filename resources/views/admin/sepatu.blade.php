@extends('admin.layouts-admin.index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">TAMBAH SEPATU</h3>

        </div>
        <div class="card-body">
            <form class="striped-rows" enctype="multipart/form-data" action="/sepatu/store" method="POST">
                @method('GET')
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Sepatu</label>
                            <input name="nama_product" type="text" class="form-control"
                                placeholder="Masukkan Nama Sepatu" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga</label>
                            <input name="harga" type="number" class="form-control" placeholder="Masukkan Harga" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Sepatu</label>
                            <select class="custom-select form-select-lg mb-6" id="Jenis_Sepatu" name="jenis_product"
                                placeholder="Jenis Sepatu">
                                <option value="">Pilih Jenis Sepatu</option>
                                <option value="Bola">Bola</option>
                                <option value="Futsal">Futsal</option>
                            </select>
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

    <div class="card ">

        <div class="card-header">
            <h3 class="card-title">DAFTAR SEPATU</h3>
        </div>

        <div class="card-body col-lg">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($product as $item)
                        <tr class="table-active">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/img/product/' . $item->id . '/gambar/1280x720/' . $item->gambar) }}"
                                    alt="" width="100px">
                            </td>
                            <td>{{ $item->nama_product }}</td>
                            <td>{{ $item->jenis_product }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <form action="/lihat/" class="d-inline">
                                    <div class=" btn-group">
                                        <a href="" class=" btn btn-warning btn-sm ">
                                            <i class="fa-regular fas fa-eye"></i>
                                        </a>
                                    </div>
                                </form>
                                {{-- <div class=" btn-group">
                                    <a href="" class=" btn btn-danger btn-sm">
                                        <i class="fa-regular fas fa-trash"></i>
                                    </a>
                                </div> --}}
                                <form class="d-inline" action="/sepatu/{{ $item->id }}" method="POST"
                                    onsubmit="return confirm('Apakah anda ingin menghapus data.?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-regular fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @include('sweetalert::alert')

        </div>
    </div>
@endsection
