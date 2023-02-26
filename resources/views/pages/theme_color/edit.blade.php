<div class="modal fade" id="ubah_{{ $color->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Tema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('theme-color.update', $color->id) }}" method="post">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label font-weight-bold">Nama Tema</label>
                            <input type="text" name="theme_name" class="form-control form-control-sm" required
                                value="{{ $color->theme_name }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label font-weight-bold">Background 1</label>
                            <input type="color" name="primary_base_color" class="form-control form-control-sm"
                                required value="{{ $color->primary_base_color }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label font-weight-bold">Background 2</label>
                            <input type="color" name="secondary_base_color" class="form-control form-control-sm"
                                required value="{{ $color->secondary_base_color }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label font-weight-bold">Background 3</label>
                            <input type="color" name="tertiary_base_color" class="form-control form-control-sm"
                                required value="{{ $color->tertiary_base_color }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label font-weight-bold">Sub-Header</label>
                            <input type="color" name="primary_color" class="form-control form-control-sm" required
                                value="{{ $color->primary_color }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label font-weight-bold">Header</label>
                            <input type="color" name="secondary_color" class="form-control form-control-sm" required
                                value="{{ $color->secondary_color }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label font-weight-bold">Button</label>
                            <input type="color" name="button_color" class="form-control form-control-sm" required
                                value="{{ $color->button_color }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label font-weight-bold">Text</label>
                            <input type="color" name="text_color" class="form-control form-control-sm" required
                                value="{{ $color->text_color }}">
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