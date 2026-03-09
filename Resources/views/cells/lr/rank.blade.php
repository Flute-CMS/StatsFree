@props(['row', 'server'])

@php
    $rankImage = null;
    if (isset($row['rank']) && $server) {
        if ($server->ranks_premier) {
            $rankImage = $server->getRank($row['rank'], $row['value'] ?? 0);
        } else {
            $ranks = $server->ranks ?? 'default';
            $format = $server->ranks_format ?? 'webp';
            $rankImage = '<img src="' . asset("assets/img/ranks/{$ranks}/{$row['rank']}.{$format}") . '" alt="Rank ' . $row['rank'] . '" loading="lazy" class="rank-img">';
        }
    }
@endphp

<div class="text-center rank-cell">
    @if($rankImage)
        {!! $rankImage !!}
    @else
        <span class="badge bg-secondary">{{ $row['rank'] ?? 0 }}</span>
    @endif
</div> 