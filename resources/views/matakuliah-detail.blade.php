@extends('layouts.app')

@section('title', 'Detail MataKuliah')

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
                <h1>Detail Mata Kuliah</h1>
            </div>
            <div>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Mata Kuliah</h4>
                    </div>

                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" name="nama_matakuliah"  id="nama_matakuliah" class="form-control" value="{{ $matakuliah->nama_matakuliah }}" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Dosen Pengampu</label>
                            <input type="text" name="id_dosen"  id="id_dosen" class="form-control" value="{{ $matakuliah->dosen->user->name }}" required="" readonly>
                        </div>

                        <!-- <div class="card-footer pb-6">
                            <button  type="submit" class="btn btn-lg btn-primary w-100">Update</button>
                        </div> -->
                    </div>

                    <div class="card-header">
                        <h4>Data Mahasiswa</h4>
                    </div>

                    <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($mahasiswas as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->user->name}}
                                            </td>
                                            <td>
                                                {{ $item->nim }}
                                            </td>
                                            <td>
                                                {{ $item->user->email }}
                                            </td>
                                        </tr>
                                    
                                    @empty
                                    <tr>
                                        <td> </td><td> </td><td>
                                            Belum Ada Mahasiswa Yang Mengambil Matkul
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
                    