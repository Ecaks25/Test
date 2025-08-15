@section('title', __('Daftar BPG'))
<x-layouts.app :title="__('Daftar BPG')">
    <div class="d-flex mb-3">
        <a href="{{ route('bpgs.create') }}" class="btn btn-primary">{{ __('Buat BPG') }}</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('No. BPG') }}</th>
                <th>{{ __('Tanggal') }}</th>
                <th>{{ __('Supplier') }}</th>
                <th>{{ __('Nomor Mobil') }}</th>
                <th>{{ __('Lot Number') }}</th>
                <th>{{ __('Item') }}</th>
                <th>{{ __('QTY (kg)') }}</th>
                <th>{{ __('QTY Aktual') }}</th>
                <th>{{ __('Loss') }}</th>
                <th>{{ __('Coly') }}</th>
                <th>{{ __('Diterima oleh') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="13" class="text-center text-muted">{{ __('Belum ada data') }}</td>
            </tr>
        </tbody>
    </table>
</x-layouts.app>
