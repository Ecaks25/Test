@section('title', __('TTPBs'))
<x-layouts.app :title="__('TTPBs')">
    <div class="d-flex mb-3">
        <a href="{{ route('ttpbs.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('Number') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('From') }}</th>
                <th>{{ __('To') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ttpbs as $ttpb)
                <tr>
                    <td>{{ $ttpb->number }}</td>
                    <td>{{ $ttpb->date->format('Y-m-d') }}</td>
                    <td>{{ $ttpb->from_location_id }}</td>
                    <td>{{ $ttpb->to_location_id }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">{{ __('No data') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.app>
