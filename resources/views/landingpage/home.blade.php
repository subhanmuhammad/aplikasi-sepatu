@extends('layout.index')



@section('content')
    {{-- carousel --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner widht-100px">
            @foreach ($baner as $item)
                <div class="carousel-item active">
                    <img src="{{ asset('storage/img/banner/' . $item->id . '/gambar/1280x720/' . $item->gambar) }}"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- end carousel --}}
    <div class="container mt-5">

        {{-- card --}}

        <div class="row">

            @foreach ($product as $item)
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card"
                        style="width: 18rem; border-radius:13px; box-shadow: 2px 2px 2px rgb(100, 96, 96),2px 2px 2px rgb(255, 252, 252); ">
                        <img src="{{ asset('storage/img/product/' . $item->id . '/gambar/1280x720/' . $item->gambar) }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ currency_IDR($item->harga) }}</h5>
                            <h5 class="card-title">{{ $item->nama_product }}</h5>

                            <small>{{ $item->jenis_product }}</small>
                            <br>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- end card --}}
    </div>
@endsection
