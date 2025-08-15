@section('title', __('Buat BPG'))
<x-layouts.app :title="__('Buat BPG')">
    <form>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">{{ __('No. BPG') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Tanggal') }}</label>
                <input type="date" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Lot Number') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Supplier') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Nomor Mobil') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Nama Barang') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('QTY (kg)') }}</label>
                <input type="number" step="0.001" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('QTY Aktual') }}</label>
                <input type="number" step="0.001" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Loss') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Coly') }}</label>
                <input type="number" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Diterima Oleh') }}</label>
                <input type="text" class="form-control" />
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Simpan Draft') }}</button>
            <button type="submit" class="btn btn-outline-primary">{{ __('Posting') }}</button>
        </div>
    </form>
</x-layouts.app>
