<style>
  .whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 25px;
    right: 25px;
    background-color: #05e45eff;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.2s ease-in-out;
    z-index: 999;
  }

  .whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 3px 3px 12px rgba(0, 0, 0, 0.3);
  }

  .whatsapp-icon {
    width: 35px;
    height: 35px;
  }
</style>


<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('assets/js/material.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
  feather.replace();
</script>
<script>
  // Set mime_type
  const mimeTypeSelect = document.querySelector('[name="mime_type"]');
  if (mimeTypeSelect) {
    const selectedMime = mimeTypeSelect.value;
    const mimeSelect = mimeTypeSelect.closest('.mdc-select');
    const mimeList = mimeSelect.querySelectorAll('.mdc-list-item');

    mimeList.forEach(item => {
      item.classList.remove('mdc-list-item--selected');
      item.removeAttribute('aria-selected');
      if (item.dataset.value === selectedMime) {
        item.classList.add('mdc-list-item--selected');
        item.setAttribute('aria-selected', 'true');
        mimeSelect.querySelector('.mdc-select__selected-text').textContent = selectedMime;
      }
    });
  }

  // Set sort_order
  const sortInput = document.querySelector('[name="sort_order"]');
  if (sortInput) {
    const selectedSort = sortInput.value;
    const sortSelect = sortInput.closest('.mdc-select');
    const sortList = sortSelect.querySelectorAll('.mdc-list-item');

    sortList.forEach(item => {
      item.classList.remove('mdc-list-item--selected');
      item.removeAttribute('aria-selected');
      if (item.dataset.value === selectedSort) {
        item.classList.add('mdc-list-item--selected');
        item.setAttribute('aria-selected', 'true');
        sortSelect.querySelector('.mdc-select__selected-text').textContent = selectedSort;
      }
    });
  }
</script>
