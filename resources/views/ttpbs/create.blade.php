@section('title', __('Create TTPB'))
<x-layouts.app :title="__('Create TTPB')">
    <form method="POST" action="{{ route('ttpbs.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">{{ __('Number') }}</label>
            <input type="text" class="form-control" value="{{ __('Auto') }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Date') }}</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('From Location') }}</label>
            <input type="text" class="form-control" value="{{ $fromLocation->name ?? $fromLocation->id }}" readonly>
            <input type="hidden" name="from_location_id" value="{{ $fromLocation->id }}">
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('To Location') }}</label>
            <select name="to_location_id" class="form-select" required>
                @foreach($locations as $loc)
                    <option value="{{ $loc->id }}">{{ $loc->name ?? $loc->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Notes') }}</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <h5 class="mt-4">{{ __('Lines') }}</h5>
        <div id="lines">
            <div class="row line mb-2">
                <div class="col">
                    <select name="lines[0][item_id]" class="form-select">
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name ?? $item->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="lines[0][lot_id]" class="form-select" required>
                        @foreach($lots as $lot)
                            <option value="{{ $lot->id }}">{{ $lot->lot_number ?? $lot->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="number" step="0.001" name="lines[0][qty_requested]" class="form-control qty-requested" placeholder="{{ __('Qty Awal') }}">
                </div>
                <div class="col">
                    <input type="number" step="0.001" name="lines[0][qty_actual]" class="form-control qty-actual" placeholder="{{ __('Qty Aktual') }}">
                </div>
                <div class="col">
                    <input type="number" step="0.001" name="lines[0][loss_qty]" class="form-control loss-qty" placeholder="{{ __('Loss') }}" readonly>
                </div>
                <div class="col">
                    <input type="number" step="0.01" name="lines[0][loss_percent]" class="form-control loss-percent" placeholder="%" readonly>
                </div>
                <div class="col">
                    <input type="number" name="lines[0][coly]" class="form-control" placeholder="{{ __('Coly') }}">
                </div>
                <div class="col">
                    <input type="text" name="lines[0][spec]" class="form-control" placeholder="{{ __('Spec') }}">
                </div>
                <div class="col">
                    <input type="text" name="lines[0][remarks]" class="form-control" placeholder="{{ __('Remarks') }}">
                </div>
            </div>
        </div>
        <button type="button" id="add-line" class="btn btn-secondary mb-3">{{ __('Add Line') }}</button>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

        <script>
            document.getElementById('add-line').addEventListener('click', function() {
                const container = document.getElementById('lines');
                const index = container.querySelectorAll('.line').length;
                const template = container.querySelector('.line').cloneNode(true);
                template.querySelectorAll('select, input').forEach(function(el) {
                    el.name = el.name.replace(/lines\[\d+\]/, 'lines[' + index + ']');
                    if (el.tagName === 'INPUT') {
                        el.value = '';
                    }
                });
                container.appendChild(template);
            });

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
