@extends('layouts.app')
@section('title')
MangaJob
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h5 class="mb-3">MangaJob</h5>
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('add-mangajob') }}" class="btn btn-primary btn-sm">+ Manga Baru</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Url Manga</th>
                                        <th>Website</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ $data->url_manga }}" target="_blank">{{ $data->url_manga }}</a>
                                        </td>
                                        <td>
                                            @php $parse = parse_url($data->url_manga) @endphp
                                            <span class="badge badge-info">{{ $parse['host'] }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('delete-mangajob', $data->id) }}"
                                                class="btn btn-danger btn-sm">Hapus</a>
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