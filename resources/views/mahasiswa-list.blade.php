@extends('layouts.app')

@section('title', 'Dosen')

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
                <h1>List Mahasiswa</h1>
            </div>
            
                <div >
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
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
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Email</th>
                                            <th>Action</th>
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
                                            <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="matakuliah-delete/{{ $item->id}}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <a href="mahasiswa-detail/{{ $item->id }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Detail"><i class="fas fa-eye"></i></a>
                                                <!-- <button type="submit" class="btn btn-danger btn-action mr-1" ><i class="fas fa-trash" data-toggle="tooltip" title="" data-original-title="Delete"></i></button> -->
                                            </form>
                                            </td>
                                        </tr>
                                    
                                    @empty
                                    <tr>
                                        <td> </td><td> </td><td>
                                            Data Post belum Tersedia.
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
                    