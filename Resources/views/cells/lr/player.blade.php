<a href="{{ url('profile/search/' . ($row['steam_info']['steamid'] ?? ($row['steam'] ?? $row['steam_id']))) }}"
    hx-boost="true" hx-target="#main" data-user-card hx-swap="outerHTML transition:true" yoyo:ignore
    class="stats__cell-player">
    <img src="{{ $row['steam_info']['avatar'] ?? asset(config('profile.default_avatar')) }}" alt="{{ $row['name'] }}">

    <span class="stats__cell-player-text">
        <span>{{ $row['name'] }}</span>
        <small class="text-muted">{{ $row['steam_info']['steamid'] ?? ($row['steam'] ?? $row['steam_id']) }}</small>
    </span>
</a>
