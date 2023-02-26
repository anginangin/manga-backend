@extends('layouts.app')
@section('title')
Warna Tema
@endsection
@section('content')
@php $setTheme = \DB::table('web_setting')->join('theme_colors', 'theme_colors.id', '=', 'web_setting.theme_id')->first() @endphp
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Tema Warna Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('theme-color.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Nama Tema</label>
                                        <input type="text" name="theme_name" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">
                                            <a href="#" data-toggle="modal" data-target="#modalBg1">
                                                BG-1
                                            </a>
                                        </label>
                                        <input type="color" name="primary_base_color" class="form-control form-control-sm"
                                            placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">
                                            <a href="#" data-toggle="modal" data-target="#modalBg2">
                                                BG-2
                                            </a>
                                        </label>
                                        <input type="color" name="secondary_base_color" class="form-control form-control-sm"
                                            placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">
                                            <a href="#" data-toggle="modal" data-target="#modalBg3">
                                                BG-3
                                            </a>
                                        </label>
                                        <input type="color" name="tertiary_base_color" class="form-control form-control-sm"
                                            placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">
                                            <a href="#" data-toggle="modal" data-target="#modalSubHeader">
                                                Sub-Header
                                            </a>
                                        </label>
                                        <input type="color" name="primary_color" class="form-control form-control-sm"
                                            placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">
                                            <a href="#" data-toggle="modal" data-target="#modalHeader">
                                                Header
                                            </a>
                                        </label>
                                        <input type="color" name="secondary_color" class="form-control form-control-sm"
                                            placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">
                                            <a href="#" data-toggle="modal" data-target="#modalButton">
                                                Button
                                            </a>
                                        </label>
                                        <input type="color" name="button_color" class="form-control form-control-sm"
                                            placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Text</label>
                                        <input type="color" name="text_color" class="form-control form-control-sm"
                                            placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="feather mr-2 icon-check-circle"></i>
                                Simpan Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Warna Tema</h5>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-left">Nama Tema</th>
                                        <th>Palet Warna</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($themeColor as $color)
                                    <tr>
                                        <td class="text-left">
                                            <i class="feather icon-check-circle {{ ($color->id != $setTheme->id) ? 'text-white' : 'text-success text-bold' }}"></i>
                                            {{ $color->theme_name }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn" style="background: {{ $color->primary_base_color }}"
                                                data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $color->primary_base_color }}">
                                            </button>
                                            <button type="button" class="btn" style="background: {{ $color->secondary_base_color }}"
                                                data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $color->secondary_base_color }}">
                                            </button>
                                            <button type="button" class="btn" style="background: {{ $color->tertiary_base_color }}"
                                                data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $color->tertiary_base_color }}">
                                            </button>
                                            <button type="button" class="btn" style="background: {{ $color->primary_color }}"
                                                data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $color->primary_color }}">
                                            </button>
                                            <button type="button" class="btn" style="background: {{ $color->secondary_color }}"
                                                data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $color->secondary_color }}">
                                            </button>
                                            <button type="button" class="btn" style="background: {{ $color->button_color }}"
                                                data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $color->button_color }}">
                                            </button>
                                            <button type="button" class="btn" style="background: {{ $color->text_color }}"
                                                data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $color->text_color }}">
                                            </button>
                                        </td>
                                        {{-- <td>
                                            @php $setTheme = \DB::table('web_setting')->join('theme_colors', 'theme_colors.id', '=',
                                            'web_setting.theme_id')->first() @endphp
                                            @if ($color->id != $setTheme->id)
                                            
                                            @endif
                                        </td> --}}
                                        <td>
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#ubah_{{ $color->id }}">Ubah</a>
                                                @if ($color->id != $setTheme->id)
                                                <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#hapus_{{ $color->id }}">Hapus</a>
                                                @endif
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#use_{{ $color->id }}">Terapkan Tema</a>
                                            </div>
                                            <!-- Modal Ubah -->
                                            @include('pages.theme_color.edit')
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapus_{{ $color->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('theme-color.destroy', $color->id) }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" value="{{ $color->id }}">
                                                                <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Terapkan Tema -->
                                            <div class="modal fade" id="use_{{ $color->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Gunakan Tema <b>{{ $color->theme_name }}</b>?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="{{ route('update-theme', 5) }}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="theme_id" value="{{ $color->id }}">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Terapkan
                                                                </button>
                                                            </form>
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
<!-- MODAL BACKGROUND 1 -->
<div class="modal fade" id="modalBg1" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">BG-1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <div class="modal-body">
            <p>Letak penggunaaan background 1, sebagai warna dasar web</p>
            <img src="/assets/images/example/background 1.png" class="img-fluid">
           </div>
        </div>
    </div>
</div>
<!-- MODAL BACKGROUND 2 -->
<div class="modal fade" id="modalBg2" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">BG-2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <div class="modal-body">
            <p>Letak penggunaaan background 2, sebagai pembungkus list manga</p>
            <img src="/assets/images/example/background 2.png" class="img-fluid">
           </div>
        </div>
    </div>
</div>
<!-- MODAL BACKGROUND 3 -->
<div class="modal fade" id="modalBg3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">BG-3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Letak penggunaaan background 3, sebagai pembungkus komponen dengan ukuran kecil</p>
                <img src="/assets/images/example/background 3.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- MODAL SUB HEADER -->
<div class="modal fade" id="modalSubHeader" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sub Header</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Letak penggunaaan sub header</p>
                <img src="/assets/images/example/sub-header.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- MODAL HEADER -->
<div class="modal fade" id="modalHeader" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Header</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Letak penggunaaan Header</p>
                <img src="/assets/images/example/header.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- MODAL BUTTON -->
<div class="modal fade" id="modalButton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Button</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Letak penggunaaan Button</p>
                <img src="/assets/images/example/read now.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection