@section('title', __('Dashboard'))
<x-layouts.app :title="__('Dashboard')">
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Transaksi hari ini') }}</h6>
                    <p class="card-text fw-bold display-6">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Top 5 stok rendah') }}</h6>
                    <ol class="mb-0 small">
                        <li>Item A</li>
                        <li>Item B</li>
                        <li>Item C</li>
                        <li>Item D</li>
                        <li>Item E</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Loss tertinggi') }}</h6>
                    <p class="card-text mb-0">-</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Batch mixing aktif') }}</h6>
                    <p class="card-text mb-0">-</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="{{ route('bpgs.create') }}" class="btn btn-primary me-2">{{ __('Input BPG') }}</a>
        <a href="{{ route('ttpb.create') }}" class="btn btn-outline-primary me-2">{{ __('Buat TTPB') }}</a>
        <a href="#" class="btn btn-outline-primary">{{ __('Batch Mixing') }}</a>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ __('IN vs OUT per lokasi') }}</span>
            <select class="form-select w-auto">
                <option>{{ __('Pilih Periode') }}</option>
            </select>
        </div>
        <div class="card-body">
            <div class="bg-light border rounded" style="height:200px;"></div>
        </div>
    </div>
</x-layouts.app>
