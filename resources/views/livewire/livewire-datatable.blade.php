<div style="font-size: 0.95em;">
    <div class="row justify-content-between mb-3">
        <div class="col-auto mb-2">
            <label>Show</label>
            <select wire:model="length" class="form-control">
                @foreach ($lengthOptions as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6 mb-2">
            <label>Kata Kunci</label>
            <input wire:model="search" type="text" class="form-control">
        </div>
    </div>

    <div class="position-relative">
        <div wire:loading.block>
            <div class="position-absolute w-100 h-100">
                <div class="w-100 h-100" style="background-color: grey; opacity:0.2"></div>
            </div>
            <h5 class="position-absolute shadow bg-white p-2 rounded"
                style="top: 50%;left: 50%;transform: translate(-50%, -50%);">Loading...</h5>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-nowrap w-100 h-100">
                <thead>
                    <tr>
                        @foreach ($columns as $col)
                            <th class="p-0">
                                @if (!isset($col['sortable']) || $col['sortable'])
                                    <button class='btn' wire:click="sortBy('{{ $col['key'] }}')">
                                        <div class="row font-weight-bold align-items-center">
                                            {{ $col['name'] }}

                                            <div class="ml-1" style="font-size: 0.75em">
                                                <i
                                                    class="fa fa-arrow-down
                                    {{ $col['key'] == $sortBy && $sortDirection == 'asc' ? '' : 'text-muted' }}"></i>
                                                <i
                                                    class="fa fa-arrow-up 
                                    {{ $col['key'] == $sortBy && $sortDirection == 'desc' ? '' : 'text-muted' }}"></i>
                                            </div>
                                        </div>
                                    </button>
                                @else
                                    <div class="pl-2 pb-2">
                                        {{ $col['name'] }}
                                    </div>
                                @endif
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            @foreach ($columns as $col)
                                @if (isset($col['render']) && is_callable($col['render']))
                                    <td>{!! call_user_func($col['render'], $item) !!}</td>
                                @elseif (isset($col['key']))
                                    <td>{{ $item[$col['key']] }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row justify-content-end mt-3">
        <div class="col">
            <em>Total Data: {{ $data->total() }}</em>
        </div>
        <div class="col-auto">
            {{ $data->links() }}
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn_copy', (e)=>{
            let data = $(e.target).attr('data');
            navigator.clipboard.writeText(data);
            Swal.fire({
                type: 'success',
                title: 'Berhasil',
                text: 'Data Berhasil Dicopy',
            });
        })
        });
</script>
@endpush
