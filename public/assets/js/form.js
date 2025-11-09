document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.mdc-select').forEach(selectEl => {
    const hiddenInput = selectEl.querySelector('input[type="hidden"]');
    if (hiddenInput) {
      const select = new mdc.select.MDCSelect(selectEl);
      select.listen('MDCSelect:change', () => {
        hiddenInput.value = select.value;
      });
    }
  });
});
