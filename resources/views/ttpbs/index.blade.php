@section('title', __('TTPB - Daftar'))
<x-layouts.app :title="__('TTPB - Daftar')">
    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">{{ __('Tanggal') }}</label>
            <input type="date" name="date" class="form-control" value="{{ request('date') }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Tujuan') }}</label>
            <select name="to_location_id" class="form-select">
                <option value="">{{ __('Semua') }}</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}" @selected(request('to_location_id') == $location->id)>{{ $location->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Item') }}</label>
            <select name="item_id" class="form-select">
                <option value="">{{ __('Semua') }}</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" @selected(request('item_id') == $item->id)>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Lot') }}</label>
            <select name="lot_id" class="form-select">
                <option value="">{{ __('Semua') }}</option>
                @foreach($lots as $lot)
                    <option value="{{ $lot->id }}" @selected(request('lot_id') == $lot->id)>{{ $lot->lot_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">{{ __('Filter') }}</button>
        </div>
    </form>

    @forelse($ttpbs as $ttpb)
        <div class="mb-4">
            <div class="mb-2">
                <strong>{{ __('Tanggal') }} :</strong> {{ $ttpb->date->format('Y-m-d') }}<br>
                <strong>{{ __('No. TTPB') }} :</strong> {{ $ttpb->number }}<br>
                <strong>{{ __('Dari') }} :</strong> {{ $ttpb->fromLocation->name ?? $ttpb->from_location_id }}<br>
                <strong>{{ __('Ke') }} :</strong> {{ $ttpb->toLocation->name ?? $ttpb->to_location_id }}
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('Lot Number') }}</th>
                        <th>{{ __('Nama Barang') }}</th>
                        <th>{{ __('QTY Awal') }}</th>
                        <th>{{ __('QTY Aktual') }}</th>
                        <th>{{ __('QTY Loss Gudang') }}</th>
                        <th>{{ __('% Loss') }}</th>
                        <th>{{ __('Coly') }}</th>
                        <th>{{ __('Spec') }}</th>
                        <th>{{ __('Keterangan') }}</th>
                        <th>{{ __('Status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ttpb->lines as $line)
                        <tr>
                            <td>{{ $line->lot->lot_number ?? '-' }}</td>
                            <td>{{ $line->item->name ?? '-' }}</td>
                            <td>{{ $line->qty_requested }}</td>
                            <td>{{ $line->qty_actual }}</td>
                            <td>{{ $line->loss_qty }}</td>
                            <td>{{ $line->loss_percent }}</td>
                            <td>{{ $line->coly }}</td>
                            <td>{{ $line->spec }}</td>
                            <td>{{ $line->remarks }}</td>
                            <td>{{ $ttpb->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">{{ __('No data') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @empty
        <p class="text-center text-muted">{{ __('No data') }}</p>
    @endforelse
</x-layouts.app>
