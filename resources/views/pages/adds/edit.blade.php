<div class="modal fade" id="edit_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Iklan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('adds.update', $data->id) }}" method="post">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label font-weight-bold">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label font-weight-bold">Script Iklan</label>
                                <textarea name="script" class="form-control form-control-sm" cols="30" rows="10">{{ $data->script }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label font-weight-bold">Posisi</label>
                                <select class="form-control form-control-sm" name="posisi">
                                    <option value="HEADER" {{ $data->posisi == 'HEADER' ? 'selected' : '' }}>Header
                                    </option>
                                    <option value="BODY" {{ $data->posisi == 'Body' ? 'selected' : '' }}>Body</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label font-weight-bold">Status</label>
                                <select class="form-control form-control-sm" name="status">

                                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Aktif</option>
                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
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
