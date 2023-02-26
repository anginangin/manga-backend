@extends('layouts.app')
@section('title')
Manga Baru
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header p-0">
                        <div class="alert alert-secondary mb-0" role="alert">
                            <h5 class="alert-heading">List website manga yang dapat di scrape</h5>
                            <hr>
                            <ol>
                                <li>kiryuu.id</li>
                                <li>komikcast.co</li>
                                <li>komiktap.in (92.87.6.124)</li>
                            </ol>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">URL Manga</label>
                                        <textarea name="url" class="form-control form-control-sm" cols="30" rows="8"
                                            id="url" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-block" id="store">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>URL</th>
                            <th>Status</th>
                        </thead>
                        <tbody id="result"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $('#store').click(function(e) {
            e.preventDefault();
            swal.fire({
                title: "Processing...",
                text: "Proses scraping mungkin membutuhkan waktu, harap menunggu.",
                showConfirmButton: false,
                allowOutsideClick: false
            });
        
            var urls = $('#url').val();
            let token = $("meta[name='csrf-token']").attr("content");
        
            //ajax
            $.ajax({
                url: `/mangajob/check-scraping`,
                type: "POST",
                cache: false,
                data: {
                    url: urls,
                    _token: token
                },
                success:function(response){
                    $('#result').html(response.data);
                    if (response.success == true) {
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }else{
                       Swal.fire({
                            type: 'error',
                            icon: 'error',
                            title: `${response.message}`,
                            text: 'Manga sudah ada di database.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                    // .then(function() {
                        //     window.location = "/mangajob";
                        // });
                    },
                    error:function(error){
                        swal.fire({
                            type: 'error',
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'periksa kembali inputan dan coba lagi.',
                            timer: 2000,
                            showConfirmButton: false
                    });
                }
            });
        });
</script>
@endpush