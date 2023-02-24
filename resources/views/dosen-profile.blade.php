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
                <h1>Detail Profile</h1>
            </div>
            <div>
                    <form action="profile-edit" method="POST" class="needs-validation" novalidate="">
                    @method('PUT')
                    @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Dosen</h4>
                            </div>

                            <div>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status')}}
                                </div>
                            @endif
                            </div>

                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name"  id="name" class="form-control" value="{{ $dosen->user->name }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the field
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>NIDN</label>
                                    <input type="text" name="nidn"  id="nidn" class="form-control" value="{{  $dosen->nidn }}" readonly>
                                    <div class="invalid-feedback">
                                        Please fill in the field
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email"  id="email" class="form-control" value="{{   $dosen->user->email }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the field
                                    </div>
                                </div>

                                <div class="card-footer pb-6">
                                    <button  type="submit" class="btn btn-lg btn-primary w-100">Update</button>
                                </div>
                                
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