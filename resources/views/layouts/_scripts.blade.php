<script src="{{asset('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script> 
<script src="{{asset('vendors/simplebar/js/simplebar.min.js')}}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{asset('assets/vendors/chart.js/js/chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/@coreui/chartjs/js/coreui-chartjs.js')}}"></script>
<script src="{{asset('assets/vendors/@coreui/utils/js/coreui-utils.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script>
    function confirmation(ev,userId){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute("href");
        swal({
            title:"Are You Sure?",
            text:"Cancel if You Are Not Sure!",
            icon:"warning",
            buttons:true,
            primaryMode:true
        })
        .then((willCancel)=>{
            if(willCancel){
                const form = document.getElementById('edit-form-' + userId);
                form.submit();  
            }

        });
    }
</script>
<script>
    function resendPasswordConfirmation(ev,userId){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute("href");
        swal({
            title:"Are You Sure?",
            text:"Password will be send to user's email",
            icon:"warning",
            buttons:true,
            primaryMode:true
        })
        .then((willCancel)=>{
            if(willCancel){
                const form = document.getElementById('resend-form-' + userId);
                form.submit();  
            }

        });
    }
</script>

