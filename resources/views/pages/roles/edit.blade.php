@extends('layouts.app')
@section('title')
    Edit Roles
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
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
                            <h5>Roles</h5>
                        </div>
                        <div class="card-body">
                            <form action="#" >
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label font-weight-bold">Role Name</label>
                                            <input type="hidden" id="roles_id" value="{{ $roles->id }}">
                                            <input type="text" id="name_role" name="name"
                                                class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                value="{{ $roles->name }}" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div id="treeview-checkbox-demo">
                                                <ul>
                                                    <li>
                                                        Pengaturan Web
                                                        <ul>
                                                            <li>
                                                                Logo & Deskripsi Web
                                                                <ul>
                                                                    <li data-value="logo_view"> View</li>
                                                                    <li data-value="logo_update"> Update</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Warna Tema
                                                                <ul>
                                                                    <li data-value="warna_tema_view"> View</li>
                                                                    <li data-value="warna_tema_create"> Create</li>
                                                                    <li data-value="warna_tema_update"> Update</li>
                                                                    <li data-value="warna_tema_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Iklan (Ads)
                                                                <ul>
                                                                    <li data-value="iklan_view"> View</li>
                                                                    <li data-value="iklan_create"> Create</li>
                                                                    <li data-value="iklan_update"> Update</li>
                                                                    <li data-value="iklan_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Banner
                                                                <ul>
                                                                    <li data-value="banner_view"> View</li>
                                                                    <li data-value="banner_create"> Create</li>
                                                                    <li data-value="banner_update"> Update</li>
                                                                    <li data-value="banner_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Seo Artikel
                                                                <ul>
                                                                    <li data-value="seo_view"> View</li>
                                                                    <li data-value="seo_update"> Update</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Pages
                                                                <ul>
                                                                    <li data-value="pages_view"> View</li>
                                                                    <li data-value="pages_create"> Create</li>
                                                                    <li data-value="pages_update"> Update</li>
                                                                    <li data-value="pages_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                </ul>

                                                {{-- pengaturan homepage FE --}}
                                                <ul>
                                                    <li>
                                                        Pengaturan Homepage FE
                                                        <ul>
                                                            <li>
                                                                Rilisan Terbaru
                                                                <ul>
                                                                    <li data-value="rilisan_terbaru_view"> View</li>
                                                                    <li data-value="rilisan_terbaru_update"> Update</li>
                                                                    <li data-value="rilisan_terbaru_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Manga Popular
                                                                <ul>
                                                                    <li data-value="manga_popular_view"> View</li>
                                                                    <li data-value="manga_popular_update"> Update</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Slider Most View
                                                                <ul>
                                                                    <li data-value="slider_most_view_view"> View</li>
                                                                    <li data-value="slider_most_view_create"> Create</li>
                                                                    <li data-value="slider_most_view_update"> Update</li>
                                                                    <li data-value="slider_most_view_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Slider Most Rating
                                                                <ul>
                                                                    <li data-value="slider_most_rating_view"> View</li>
                                                                    <li data-value="slider_most_rating_create"> Create</li>
                                                                    <li data-value="slider_most_rating_update"> Update</li>
                                                                    <li data-value="slider_most_rating_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Slider Rekomendasi
                                                                <ul>
                                                                    <li data-value="slider_rekomendasi_view"> View</li>
                                                                    <li data-value="slider_rekomendasi_create"> Create</li>
                                                                    <li data-value="slider_rekomendasi_update"> Update</li>
                                                                    <li data-value="slider_rekomendasi_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>

                                                        </ul>
                                                    </li>

                                                </ul>
                                                {{-- Pengaturan Manga --}}
                                                <ul>
                                                    <li>
                                                        Manga
                                                        <ul>
                                                            <li>
                                                                Manga Job
                                                                <ul>
                                                                    <li data-value="manga_job_view"> View</li>
                                                                    <li data-value="manga_job_update"> Create</li>
                                                                    <li data-value="manga_job_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>

                                                            <li>
                                                                List Manga
                                                                <ul>
                                                                    <li data-value="list_manga_view"> View</li>
                                                                    <li data-value="list_manga_update"> Update</li>
                                                                    <li data-value="list_manga_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                Blacklist Manga
                                                                <ul>
                                                                    <li data-value="blacklist_manga_view"> View</li>
                                                                    <li data-value="blacklist_manga_restore"> Restore</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                List Comment
                                                                <ul>
                                                                    <li data-value="list_comment_view"> View</li>
                                                                    <li data-value="list_comment_reply"> Reply</li>
                                                                    <li data-value="list_comment_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                </ul>

                                                {{-- Pengaturan User --}}
                                                <ul>
                                                    <li>
                                                        User
                                                        <ul>
                                                            <li>
                                                                Administrator
                                                                <ul>
                                                                    <li data-value="administrator_view"> View</li>
                                                                    <li data-value="administrator_create"> Create</li>
                                                                    <li data-value="administrator_permission"> Permission
                                                                    </li>
                                                                    <li data-value="administrator_delete"> Delete</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>

                                                            <li>
                                                                Member
                                                                <ul>
                                                                    <li data-value="member_view"> View</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>

                                                            <li>
                                                                Roles
                                                                <ul>
                                                                    <li data-value="roles_view"> View</li>
                                                                    <li data-value="roles_create"> Create</li>
                                                                    <li data-value="roles_update"> Update</li>
                                                                    <li data-value="roles_delete"> Update</li>
                                                                    <li data-value="" class="d-none"> </li>
                                                                </ul>
                                                            </li>

                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button  id="store" class="btn btn-primary float-right">
                                    <i class="feather mr-2 icon-check-circle"></i>
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
        <script src="{{ asset('assets/js/logger.js') }}"></script>
        <script src="{{ asset('assets/js/treeview.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $('#treeview-checkbox-demo').treeview({
                debug: true,
                data: @json($permissions ?? []),
                showAlwaysCheckBox: true,
                fold: true,
                openAllFold: false
            });
            $('#store').on('click', function() {
                var dataSelected = $('#treeview-checkbox-demo').treeview('selectedValues');
                var name = $('#name_role').val();
                var roles_id = $('#roles_id').val();
                dataSelected = jQuery.grep(dataSelected, function(n, i) {
                    return (n !== "" && n != null);
                });

                $.ajax({
                    type: "PATCH",
                    url: `${window.location.origin}/roles/${roles_id}`,
                    data: {
                        data: dataSelected,
                        name: name,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        loading();
                    },
                    success: function(response) {
                        if (response.status == true) {
                            Swal.fire(
                                'Success!',
                                'Berhasil Update Permission!',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Error!',
                                'Ada Masalah Coba Lagi Ya!',
                                'error'
                            )
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire(
                            'Error!',
                            errorThrown,
                            'error'
                        )
                    }
                });
            });

            const loading = function() {
                Swal.fire({
                    title: 'Loading!',
                    html: 'Wait A Moment.',
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
            };
        </script>
    @endpush
