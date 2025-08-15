@section('title', __('Stock Gudang'))
<x-layouts.app :title="__('Stock Gudang')">
    <form class="row g-3 mb-3">
        <div class="col-md-3">
            <label class="form-label">{{ __('Tanggal') }}</label>
            <input type="date" class="form-control" name="date" />
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Lot Number') }}</label>
            <input type="text" class="form-control" name="lot_number" />
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Item') }}</label>
            <input type="text" class="form-control" name="item" />
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">{{ __('Filter') }}</button>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('No. BPG') }}</th>
                <th>{{ __('Tanggal') }}</th>
                <th>{{ __('Lot Number') }}</th>
                <th>{{ __('Supplier') }}</th>
                <th>{{ __('Nomor Mobil') }}</th>
                <th>{{ __('Nama Barang') }}</th>
                <th>{{ __('QTY (kg)') }}</th>
                <th>{{ __('QTY Aktual') }}</th>
                <th>{{ __('Loss') }}</th>
                <th>{{ __('Coly') }}</th>
                <th>{{ __('Diterima Oleh') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="11" class="text-center text-muted">{{ __('Belum ada data') }}</td>
            </tr>
        </tbody>
    </table>
</x-layouts.app>
