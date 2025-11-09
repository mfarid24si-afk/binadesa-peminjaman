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

<a href="https://wa.me/6281234567890" class="whatsapp-float" target="_blank">
  <img src="{{ asset('assets/images/wa.jpg') }}" alt="WhatsApp" class="whatsapp-icon">
</a>
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