{{-- @include('layouts.admin.partials.empty-state', ['label' => 'data']) --}}
<div style="text-align:center; padding:40px 20px; color:var(--text-secondary);">
  <i class="material-icons" style="font-size:48px; opacity:.25; display:block; margin-bottom:8px;">inbox</i>
  <div style="font-size:14px;">Belum ada data {{ $label ?? '' }}</div>
</div>
