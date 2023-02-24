@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

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
                <h1>Detail Mahasiswa</h1>
            </div>
            <div>
                    <form method="post" class="needs-validation" novalidate="">
                    @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Mahasiswa</h4>
                            </div>

                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name"  id="name" class="form-control" value="{{  $mahasiswa->user->name }}" required=""readonly>
                                </div>
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" name="nim"  id="nim" class="form-control" value="{{  $mahasiswa->nim }}" required="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email"  id="email" value="{{  $mahasiswa->user->email }}" class="form-control" required="" readonly>
                                </div>
                            </div>

                            <div class="card-header">
                                <h4>Matkul Mahasiswa</h4>
                            </div>
                            <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Dosen Pengampu</th>
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
                                        </tr>
                                    
                                    @empty
                                    <tr>
                                        <td> </td><td> </td><td>
                                            Data belum Tersedia.
                                        </td><td> </td>
                                    </tr>
                                    @endforelse

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>




                            
                                
                            </div>
                        </div>
                    </form>
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