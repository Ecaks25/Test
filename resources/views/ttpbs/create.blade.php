@section('title', __('Create TTPB'))
<x-layouts.app :title="__('Create TTPB')">
    <form method="POST" action="{{ route('ttpbs.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">{{ __('Number') }}</label>
            <input type="text" name="number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Date') }}</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('From Location') }}</label>
            <select name="from_location_id" class="form-select" required>
                @foreach($locations as $loc)
                    <option value="{{ $loc->id }}">{{ $loc->name ?? $loc->id }}</option>
                @endforeach
            </select>
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
                    <input type="number" step="0.001" name="lines[0][qty_requested]" class="form-control" placeholder="{{ __('Qty Requested') }}">
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
    </script>
</x-layouts.app>
