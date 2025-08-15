@section('title', __('Buat BPG'))
<x-layouts.app :title="__('Buat BPG')">
    <form>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">{{ __('Tanggal') }}</label>
                <input type="date" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('No. BPG') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Supplier') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Nomor Mobil / Dokumen') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Item') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Lot Number') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('QTY (kg)') }}</label>
                <input type="number" step="0.001" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('QTY Aktual (kg)') }}</label>
                <input type="number" step="0.001" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Loss (kg / %)') }}</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-4">
                <label class="form-label">{{ __('Coly') }}</label>
                <input type="number" class="form-control" />
            </div>
            <div class="col-md-12">
                <label class="form-label">{{ __('Catatan') }}</label>
                <textarea class="form-control"></textarea>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Simpan Draft') }}</button>
            <button type="submit" class="btn btn-outline-primary">{{ __('Posting') }}</button>
        </div>
    </form>
</x-layouts.app>
