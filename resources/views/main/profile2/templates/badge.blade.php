
<div class="col-md-2 col-sm-3 col-xs-2">
  <div class="text-center div-badge">
    <span class="badgeLevel">{{ $badge->pivot->level }}</span>
    <img src="{{ $badge->icon }}" data-toggle="tooltip" data-delay='{"show":2500, "hide": 0}' title="{{ $badge->description }}" data-placement="bottom">
    <p>{{ $badge->name }}</p>
  </div>
</div>
