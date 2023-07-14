<script>
    @if(Session::has('success'))
    toastr.options = {
      "closeButton":true,
      "progressBar":true
    }
      toastr.success("{{ session('success')}}",'Success!',{timeOut:12000});
    @endif
    @if(Session::has('info'))
    toastr.options = {
      "closeButton":true,
      "progressBar":true
    }
      toastr.info("{{ session('info')}} ",'Info!',{timeOut:10000});
    @endif
    @if(Session::has('warning'))
    toastr.options = {
      "closeButton":true,
      "progressBar":true
    }
      toastr.warning("{{ session('warning')}} ");
    @endif
    @if(Session::has('error'))
    toastr.options = {
      "closeButton":true,
      "progressBar":true
    }
      toastr.error("{{ session('error')}} ");
    @endif
  </script>