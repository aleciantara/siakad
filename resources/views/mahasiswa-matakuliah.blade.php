@extends('layouts.app')

@section('title', 'MataKuliah Mahasiswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content" style="min-height: 535px;">
        <section class="section">
            <div class="section-header">
                <h1>Mata Kuliah Mahasiswa</h1>
            </div>
            
                <div >
                    <div class="card">
                        <div class="card-header">
                            <h4>Mata Kuliah Yang Diambil</h4>
                            <!-- <div class="card-header-action">
                                <a href="/matakuliah-add" class="btn btn-primary">Add Data</a>
                            </div> -->
                        </div>
                        <div>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status')}}
                                </div>
                            @endif
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Dosen Pengampu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($matkulMahasiswa as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->matakuliah->nama_matakuliah}}
                                            </td>
                                            <td>
                                                {{ $item->matakuliah->dosen->user->name }}
                                            </td>
                                            
                                            <td>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="matkul-mahasiswa-batal/{{ $item->id }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <!-- <a href="matkul-mahasiswa-batal/{{ $item->id }}" class="btn btn-danger btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Batalkan Matkul"><i class="fas fa-minus"></i></a>
                                                <a href="mahasiswa-detail/{{ $item->id }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Detail"><i class="fas fa-eye"></i></a> -->
                                                <button type="submit" class="btn btn-danger btn-action mr-1" ><i class="fas fa-minus"data-toggle="tooltip" title="" data-original-title="Batalkan Matkul"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                    
                                    @empty
                                    <tr>
                                        <td> </td><td> </td><td>
                                            Anda Belum Mengambil Matkul Apapun
                                        </td><td> </td>
                                    </tr>
                                    @endforelse

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-header">
                            <h4>List Mata Kuliah</h4>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Dosen Pengampu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($matakuliahs as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->nama_matakuliah}}
                                            </td>
                                            <td>
                                                {{ $item->dosen->user->name }}
                                            </td>
                                            <td>
                                                <a href="matkul-mahasiswa-tambah/{{ $item->id }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Ambil Matkul"><i class="fas fa-plus"></i></a>
                                            </td>
                                        </tr>
                                    
                                    @empty
                                    <tr>
                                        <td> </td><td> </td><td>
                                            Belum Ada Matkul Yang Bisa Ditambahkan
                                        </td><td> </td>
                                    </tr>
                                    @endforelse

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
                    