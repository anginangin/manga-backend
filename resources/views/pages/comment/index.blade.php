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
                                        <th>Comment</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $item)
                                            <tr>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ !empty($item->commenter_id) ? App\Models\User::where('id', $item->commenter_id)->first()->name : $item->guest_name }}
                                                </td>
                                                <td>
                                                    {{ $item->comment }}
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
