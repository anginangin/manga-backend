@extends('layouts.app')
@section('title')
    Comment
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Comment</h5>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('message'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table" id='datatable'>
                                    <thead>
                                        <th style="width: 20%">Date</th>
                                        <th style="width: 20%">User</th>
                                        <th>Manga</th>
                                        <th>Comment</th>
                                        <th style="width: 15%">Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $item)
                                            <tr>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ !empty($item->commenter_id) ? App\Models\User::where('id', $item->commenter_id)->first()->name : $item->guest_name }}
                                                </td>
                                                <td>
                                                    {{ App\Models\Manga::where('id', $item->commentable_id)->first()->title ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $item->comment }}
                                                </td>
                                                <td>
                                                    <a href="#" id="reply" data-toggle="modal"
                                                        data-target="#modal-edit" data-id="{{ $item->id }}"
                                                        data-manga_id="{{ $item->commentable_id }}"
                                                        class="btn badge btn-primary">Reply</a>
                                                    <a href="{{ route('comment.delete', $item->id) }}"
                                                        class="btn badge btn-danger" onclick="return confirm('Yakin Hapus Data?')">Delete</a>
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
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post" id="form-reply">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold">Reply</label>
                                    <textarea name="comment" class="form-control form-control-sm" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="feather mr-2 icon-check-circle"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('addon-script')
        <script>
            $(document).ready(function() {
                $(document).on('click', '#reply', function() {
                    var id = $(this).data('id');
                    var manga_id = $(this).data('manga_id');
                    $('#form-reply').attr('action', '/comment/reply/' + id + '/' + manga_id);
                });
            });
        </script>
    @endpush
@endsection
