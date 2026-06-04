{{--
  Reusable page shell for all table/data pages.
  Usage: @include('layouts.admin.partials.page-layout', ['title' => 'Data Peminjaman', 'slot' => ...])
  But since Blade @include doesn't support slot pattern, each page @include's this and wraps @yield.
  Instead, pages use this as their outer structure via @extends — NOT used directly.
  This file documents the standard structure; pages copy this pattern.
--}}
