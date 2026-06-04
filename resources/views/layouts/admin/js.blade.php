{{-- WhatsApp Float Button --}}
<a href="https://wa.me/6281234567890" class="whatsapp-float" target="_blank" rel="noopener" aria-label="Hubungi via WhatsApp">
  <img src="{{ asset('assets/images/wa.jpg') }}" alt="WhatsApp" class="whatsapp-icon">
</a>

{{-- Core vendor JS --}}
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

{{-- Chart.js --}}
<script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>

{{-- Material Design JS --}}
<script src="{{ asset('assets/js/material.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

{{-- Dashboard charts (Memuat file dashboard.js riil yang telah kita perbaiki di atas) --}}
<script src="{{ asset('assets/js/dashboard.js') }}"></script>

{{-- Feather icons (used in some older views) --}}
<script src="https://unpkg.com/feather-icons" defer></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (typeof feather !== 'undefined') feather.replace();
  });
</script>

{{-- MDC Select sync for edit forms (only runs if .mdc-select exists) --}}
<script>
(function () {
  function syncMdcSelect(inputName) {
    var input = document.querySelector('[name="' + inputName + '"]');
    if (!input) return;
    var sel = input.closest('.mdc-select');
    if (!sel) return;
    var selectedVal = input.value;
    sel.querySelectorAll('.mdc-list-item').forEach(function (item) {
      var isMatch = item.dataset.value === selectedVal;
      item.classList.toggle('mdc-list-item--selected', isMatch);
      isMatch ? item.setAttribute('aria-selected', 'true') : item.removeAttribute('aria-selected');
      if (isMatch) {
        var textEl = sel.querySelector('.mdc-select__selected-text');
        if (textEl) textEl.textContent = selectedVal;
      }
    });
  }
  document.addEventListener('DOMContentLoaded', function () {
    syncMdcSelect('mime_type');
    syncMdcSelect('sort_order');
  });
})();
</script>
