@extends('layouts.app')

@section('title', 'MataKuliah')

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
                <h1>Tambah Mata Kuliah</h1>
            </div>
            <div>
                    <form method="post" class="needs-validation" novalidate="">
                    @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Tambah Mata Kuliah</h4>
                            </div>

                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Nama Mata Kuliah</label>
                                    <input type="text" name="nama_matakuliah"  id="nama_matakuliah" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the field
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Dosen Pengampu</label>
                                    <select type="text" name="id_dosen" id="id_dosen" class="form-control" >
                                        @foreach($dosens as $item)                    
                                        <option value="{{ $item->id}}">{{ $item->user->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please fill in the field
                                    </div>
                                </div>

                                <div class="card-footer pb-6">
                                    <button  type="submit" class="btn btn-lg btn-primary w-100">Save</button>
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
                    