@section('title', __('TTPB - Buat'))
<x-layouts.app :title="__('TTPB - Buat')">
    <form method="POST" action="{{ route('ttpb.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">{{ __('Dari') }}</label>
            <input type="text" class="form-control" value="{{ optional($fromLocation)->name ?? optional($fromLocation)->id ?? '' }}" readonly>
            <input type="hidden" name="from_location_id" value="{{ optional($fromLocation)->id }}">
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Ke') }}</label>
            <select name="to_location_id" class="form-select" required>
                @foreach($locations as $loc)
                    <option value="{{ $loc->id }}">{{ $loc->name ?? $loc->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Tanggal') }}</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('No. TTPB') }}</label>
            <input type="text" class="form-control" value="{{ __('Auto') }}" readonly>
        </div>

        <h5 class="mt-4">{{ __('Detail') }}</h5>
        <div class="row fw-bold mb-2">
            <div class="col">{{ __('Lot Number') }}<br><small>{{ __('(bila dari lokasi lot-tracked)') }}</small></div>
            <div class="col">{{ __('Nama Barang') }}</div>
            <div class="col">{{ __('QTY Awal') }}</div>
            <div class="col">{{ __('QTY Aktual') }}</div>
            <div class="col">{{ __('QTY Loss Gudang') }}</div>
            <div class="col">{{ __('% Loss') }}</div>
            <div class="col">{{ __('Coly') }}</div>
            <div class="col">{{ __('Spec') }}</div>
            <div class="col">{{ __('Keterangan') }}</div>
        </div>
        <div id="lines">
            <div class="row line mb-2">
                <div class="col">
                    <select name="lines[0][lot_id]" class="form-select" required>
                        @foreach($lots as $lot)
                            <option value="{{ $lot->id }}">{{ $lot->lot_number ?? $lot->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="lines[0][item_id]" class="form-select">
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name ?? $item->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="number" step="0.001" name="lines[0][qty_requested]" class="form-control qty-requested" placeholder="{{ __('QTY Awal') }}">
                </div>
                <div class="col">
                    <input type="number" step="0.001" name="lines[0][qty_actual]" class="form-control qty-actual" placeholder="{{ __('QTY Aktual') }}">
                </div>
                <div class="col">
                    <input type="number" step="0.001" name="lines[0][loss_qty]" class="form-control loss-qty" placeholder="{{ __('QTY Loss Gudang') }}" readonly>
                </div>
                <div class="col">
                    <input type="number" step="0.01" name="lines[0][loss_percent]" class="form-control loss-percent" placeholder="{{ __('% Loss') }}" readonly>
                </div>
                <div class="col">
                    <input type="number" name="lines[0][coly]" class="form-control" placeholder="{{ __('Coly') }}">
                </div>
                <div class="col">
                    <input type="text" name="lines[0][spec]" class="form-control" placeholder="{{ __('Spec') }}">
                </div>
                <div class="col">
                    <input type="text" name="lines[0][remarks]" class="form-control" placeholder="{{ __('Keterangan') }}">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        </div>
    </form>

    <script>
        function recalc(line) {
            const qtyReq = parseFloat(line.querySelector('.qty-requested').value) || 0;
            const qtyAct = parseFloat(line.querySelector('.qty-actual').value) || 0;
            const loss = qtyReq - qtyAct;
            const lossPercent = qtyReq ? (loss / qtyReq) * 100 : 0;
            line.querySelector('.loss-qty').value = loss.toFixed(3);
            line.querySelector('.loss-percent').value = lossPercent.toFixed(2);
        }

        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('qty-requested') || e.target.classList.contains('qty-actual')) {
                recalc(e.target.closest('.line'));
            }
        });
    </script>
</x-layouts.app>
