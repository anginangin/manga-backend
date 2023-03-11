@extends('layouts.app')
@section('title')
    {{ $detail->title }}
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <h5 class="mb-3">Detail Manga</h5>
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-8">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <div class="card-body">
                                    <img src="{{ $detail->thumbnail ? config('constant.url.api_image') . '/' . $detail->thumbnail : $detail->poster }}"
                                        class="img-fluid">
                                </div>
                                {{-- <div class="text-center">
                            </div> --}}
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $detail->title }}</h5>
                                    <div class="table-responsive">
                                        <table class="table-borderless table-sm" style="width: 100%">
                                            @php $information = json_decode($detail->information) @endphp
                                            @foreach ($information as $info)
                                                @if ($detail->domain == config('constant.url.komikstation'))
                                                    <tr>
                                                        <td>{{ $info->value }}</td>
                                                    </tr>
                                                @else
                                                    @if ($info->value)
                                                        <tr>
                                                            <td>{{ $info->key }}</td>
                                                            <td>{{ $info->value }}</td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-block mt-2" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Ubah
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('manga.update', $detail->id) }}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="alert alert-info">
                                                            <b><i>Kosongkan field jika tidak ingin menampilkan informasi di
                                                                    halaman frontend</i></b>
                                                        </div>
                                                        @foreach ($information as $key => $info)
                                                            <div class="form-group">
                                                                <label>{{ $info->key }}</label>
                                                                <input type="hidden" class="form-control form-control-sm"
                                                                    name="key[]" value="{{ $info->key }}">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="value[]" value="{{ $info->value }}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Informasi</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td>Rating</td>
                                        <td>{{ $rating ? $rating['rating'] : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dilihat (All Time)</td>
                                        <td>{{ number_format(count($mangaViews)) }} kali</td>
                                    </tr>
                                    <tr>
                                        <td>Komentar</td>
                                        <td>{{ count($comment) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>List Chapter</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm" id="datatable">
                                    <thead>
                                        <th>No</th>
                                        <th>Chapter</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @php $chapters = json_decode($detail['chapters']) @endphp
                                        @foreach ($chapters as $chapter)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Chapter {{ floatval($chapter->chapter) }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm float-right"
                                                        data-toggle="modal" data-target="#delete_{{ $chapter->id }}">
                                                        Hapus
                                                    </button>
                                                    <div class="modal fade" id="delete_{{ $chapter->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin
                                                                        hapus <b>Chapter
                                                                            {{ floatval($chapter->chapter) }}?</b></h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <a href="{{ route('delete_chapter', $chapter->id) }}"
                                                                        class="btn btn-danger">Ya, Hapus</a>
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

                {{-- comment --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Comment</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm" id="datatable">
                                    <thead>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Comment</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $dataComment = App\Models\Comment::where('commentable_id', $detail->id)
                                                ->orderBy('created_at', 'DESC')
                                                ->get();
                                        @endphp
                                        @foreach ($dataComment as $item)
                                            <tr>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ !empty($item->commenter_id) ? App\Models\User::where('id', $item->commenter_id)->first()->name : $item->guest_name }}
                                                </td>
                                                <td>{{ $item->comment }}</td>
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

@push('addon-script')

@endpush
