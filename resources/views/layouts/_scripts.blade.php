<script src="{{asset('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
<script src="{{asset('vendors/simplebar/js/simplebar.min.js')}}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{asset('assets/vendors/chart.js/js/chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/@coreui/chartjs/js/coreui-chartjs.js')}}"></script>
<script src="{{asset('assets/vendors/@coreui/utils/js/coreui-utils.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function deactivateUserConfirmation(ev,userId){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute("href");
        swal({
            title:"Are You Sure?",
            text:"This User will be Deactivated",
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

    function activateUserConfirmation(ev,userId){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute("href");
        swal({
            title:"Are You Sure?",
            text:"This User will be Activated",
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

    function deleteProjectConfirmation(ev,projectId){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute("href");
        swal({
            title:"Are You Sure?",
            text:"Project will be deleted",
            icon:"warning",
            buttons:true,
            primaryMode:true
        })
        .then((willCancel)=>{
            if(willCancel){
                const form = document.getElementById('deleteProject-form-' + projectId);
                form.submit();
            }
        });
    }

    function editProjectConfirmation(ev,projectId){
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute("href");
        swal({
            title:"Are You Sure?",
            text:"Project will be Edited",
            icon:"warning",
            buttons:true,
            primaryMode:true
        })
        .then((willCancel)=>{
            if(willCancel){
                const form = document.getElementById('editProject-form-' + projectId);
                form.submit();
            }
        });
    }

</script>
