@props(['settings'])

<div class="row g-3">
    <div class="col-md-12">
        <x-admin::forms.field name="table_name" label="{{ __('stats-free.settings.table_name') }}" required>
            <x-admin::fields.input name="table_name" id="table_name" value="{{ request()->input('table_name', $settings['table_name'] ?? 'base') }}"
                placeholder="{{ __('stats-free.settings.table_name_placeholder') }}" required />
        </x-admin::forms.field>
    </div>
</div>