<script src="{{asset('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script> 
<script src="{{asset('vendors/simplebar/js/simplebar.min.js')}}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{asset('assets/vendors/chart.js/js/chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/@coreui/chartjs/js/coreui-chartjs.js')}}"></script>
<script src="{{asset('assets/vendors/@coreui/utils/js/coreui-utils.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
{{-- 
<script>
    function confirmation(event) {
        event.preventDefault(); 
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to edit this user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, edit it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = event.target.href; // If confirmed, navigate to the edit link
            }
        });
    }
</script> --}}

