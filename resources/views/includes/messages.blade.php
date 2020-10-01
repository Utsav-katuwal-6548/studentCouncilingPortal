<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<!-- Sweet Alert Laravel COnfirmation Try -->
<script>
    var deleter = {
        linkSelector: "a#delete-btn",
        init: function () {
            $(this.linkSelector).on('click', {
                self: this
            }, this.handleClick);
        },
        handleClick: function (event) {
            event.preventDefault();
            var self = event.data.self;
            var link = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3d4144',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location = link.attr('href');
                } else {
                    Swal.fire("Cancelled", "Deletion Cancelled", "error");
                }
            })
        },
    };
    deleter.init();
</script>

@if (session('success'))

<script>
    // Command: toastr["success"]("{{ session('success') }}", "Success")
    // toastr.options = {
    //     "closeButton": true,
    //     "debug": false,
    //     "newestOnTop": false,
    //     "progressBar": false,
    //     "positionClass": "toast-top-right",
    //     "preventDuplicates": false,
    //     "onclick": null,
    //     "showDuration": "300",
    //     "hideDuration": "1000",
    //     "timeOut": "5000",
    //     "extendedTimeOut": "1000",
    //     "showEasing": "swing",
    //     "hideEasing": "linear",
    //     "showMethod": "fadeIn",
    //     "hideMethod": "fadeOut"
    // }
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-top-right';
    toastr.options.showDuration = 1000;
    toastr['success']("{{ session('success') }}");
</script>

@endif

@if (session('error'))

<script>
    Command: toastr["error"]("{{ session('error') }}", "error")
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

@endif

<style>
#toast-container .toast-success{background-color:green}.swal2-popup{background-color:#202325!important}.swal2-title{color:#fff}.swal2-modal .swal2-content{color:#b9d0de}.swal2-styled:focus{box-shadow:none}
#toast-container .toast-error{background-color:crimson}.swal2-popup{background-color:#202325!important}.swal2-title{color:#fff}.swal2-modal .swal2-content{color:#b9d0de}.swal2-styled:focus{box-shadow:none}
</style>