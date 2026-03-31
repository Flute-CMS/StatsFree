@extends('flute::layouts.app')

@section('title', __('stats-free.title'))
@section('description', __('stats-free.description'))

@push('content')
    <section class="stats-free container">
        <div class="col-md-12">
            <x-legend title="{{ __('stats-free.title') }}" description="{{ __('stats-free.description') }}">
                @if (sizeof($servers) > 1)
                    <div hx-get="{{ url()->current() }}" hx-trigger="change from:find select" hx-push-url="true"
                        hx-swap="morph" hx-target="#main" hx-include="find [name=server_id]">
                        <x-fields.select name="server_id">
                            @foreach ($servers as $server)
                                <option value="{{ $server['server']->id }}"
                                    {{ request()->input('server_id') == $server['server']->id ? 'selected' : '' }}>
                                    {{ $server['server']->name }}
                                </option>
                            @endforeach
                        </x-fields.select>
                    </div>
                @endif
            </x-legend>

            <x-card withoutPadding>
                @yoyo('stats-free-table')
            </x-card>
        </div>
    </section>
@endpush
