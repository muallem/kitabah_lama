<div wire:ignore.self class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Jenis Skripsi</h5>
            </div>
            <form wire:submit.prevent='store'>
                <div class="modal-body">
                    {{-- Judul --}}
                    <div class="row align-items-end my-2 ">
                        <div class="col-md">
                            <label>Judul :</label>
                            <input class="form-control" type="text" wire:model.lazy="title" disabled>
                        </div>
                    </div>
                    {{-- Jenis Skripsi --}}
                    <div class="row align-items-end my-2 ">
                        <div class="col-md">
                            <label>Jenis Skripsi :</label>
                            <select class="form-select" id="group" wire:model.lazy='group' placeholder="Jenis Skripsi">
                                <option value="kuantitatif">Kuantitatif</option>
                                <option value="kualitatif">Kualitatif</option>
                                <option value="rnd">RND</option>
                            </select>

                            @error('group')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>
        </div>
    </div>
</div>

@push('js')

    <script>
        $("#detailModal").on('hide.bs.modal', function() {
            @this.call('resetInput');
        });
    </script>
@endpush
