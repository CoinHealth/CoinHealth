<div class="col-md-12 activity-wrapper">
  <div class="act-title">
    <p>{{ isset($activity) ? $activity->from_url : '' }}</p>
  </div>
  <div class="act-desc">
    <p>{{ isset($activity) ? $activity->notification : '' }}</p>
  </div>
</div>
