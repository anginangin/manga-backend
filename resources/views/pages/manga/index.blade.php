@extends('layouts.app')
@section('title')
MangaJob
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h5 class="mb-3">Manga</h5>
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Poster</th>
                                        <th>Title</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($manga as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ $data->poster }}" class="img-fluid" style="max-height: 50px"></td>
                                        <td>{{ Str::limit($data->title, 50) }}</td>
                                        <td class="float-right">
                                            <div class="btn-group">
                                                <a href="{{ route('manga.show', $data->slug) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                &nbsp;
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_{{ $data->id }}">
                                                    Hapus
                                                </button>
                                                
                                                <div class="modal fade" id="hapus_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Yakin hapus?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <form action="{{ route('blacklist', $data->id) }}" method="post">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary">Ya, hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection