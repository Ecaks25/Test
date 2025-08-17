@section('title', __('Monitoring'))
<x-layouts.app :title="__('Monitoring')">
    <form class="row g-2 mb-4">
        <div class="col-md-3">
            <label class="form-label">{{ __('Tanggal Dari') }}</label>
            <input type="date" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Tanggal Sampai') }}</label>
            <input type="date" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Item') }}</label>
            <input type="text" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Lot Number') }}</label>
            <input type="text" class="form-control" />
        </div>
    </form>

    <ul class="nav nav-tabs" id="monitoringTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="stok-tab" data-bs-toggle="tab" data-bs-target="#stok" type="button" role="tab">{{ __('Stok Saat Ini') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ledger-tab" data-bs-toggle="tab" data-bs-target="#ledger" type="button" role="tab">{{ __('Kartu Stok / Ledger') }}</button>
        </li>
    </ul>
    <div class="tab-content mt-3" id="monitoringTabContent">
        <div class="tab-pane fade show active" id="stok" role="tabpanel" aria-labelledby="stok-tab">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('Lokasi') }}</th>
                        <th>{{ __('Item') }}</th>
                        <th>{{ __('Lot Number') }}</th>
                        <th>{{ __('QTY (kg)') }}</th>
                        <th>{{ __('Coly') }}</th>
                        <th>{{ __('Terakhir Update') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center text-muted">{{ __('Belum ada data') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="ledger" role="tabpanel" aria-labelledby="ledger-tab">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('Tanggal') }}</th>
                        <th>{{ __('Ref') }}</th>
                        <th>{{ __('Dari → Ke') }}</th>
                        <th>{{ __('Item') }}</th>
                        <th>{{ __('Lot Number') }}</th>
                        <th>{{ __('IN') }}</th>
                        <th>{{ __('OUT') }}</th>
                        <th>{{ __('Saldo') }}</th>
                        <th>{{ __('User') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9" class="text-center text-muted">{{ __('Belum ada data') }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('monitoring.export') }}" class="btn btn-outline-secondary">{{ __('Export Excel') }}</a>
                <button class="btn btn-outline-secondary">{{ __('Export PDF') }}</button>
            </div>
        </div>
    </div>
</x-layouts.app>
