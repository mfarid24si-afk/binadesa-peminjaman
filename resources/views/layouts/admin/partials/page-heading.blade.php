{{-- @include('layouts.admin.partials.page-heading', ['icon'=>'...', 'title'=>'...', 'breadcrumb'=>'...']) --}}
<div class="page-header" style="margin-bottom:20px;">
  <div>
    <h4 style="display:flex; align-items:center; gap:8px;">
      <i class="material-icons" style="font-size:22px; color:var(--primary);">{{ $icon ?? 'article' }}</i>
      {{ $title ?? 'Halaman' }}
    </h4>
    <div class="breadcrumb-desa">
      <i class="material-icons" style="font-size:12px; vertical-align:middle;">home</i>
      {{ $breadcrumb ?? '' }}
    </div>
  </div>
</div>
