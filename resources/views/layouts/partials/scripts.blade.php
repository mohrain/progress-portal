<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
 <script type="text/javascript" src="{{ asset('assets/mdb/js/jquery.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/mdb/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/mdb/js/bootstrap.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('assets/mdb/js/mdb.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/mdb/js/addons/datatables.min.js') }}"></script>
<script src="{{ asset('assets/nepali-datepicker-v4/js/nepali.datepicker.v4.0.1.min.js') }}" type="text/javascript">
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 300,
            placeholder : "Descriptions",
        });
    });
</script>
<script>
    $('.select2').select2({
        placeholder: 'Choose',
        theme: "bootstrap-5",
        // placeholder: 'Vendor Select',
    });
</script>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    let deferredPrompt;

    function showInstallPromotion() {
        // hideInstallPromotion();
        // Show the install prompt
        // deferredPrompt.prompt();
        // Wait for the user to respond to the prompt
        // const { outcome } = await deferredPrompt.userChoice;
        deferredPrompt.userChoice;
        // Optionally, send analytics event with outcome of user choice
        // console.log(`User response to the install prompt: ${outcome}`);
        // We've used the prompt, and can't use it again, throw it away
        deferredPrompt = null;
    }

    window.addEventListener('beforeinstallprompt', (e) => {
        console.log('event listened');
        // Prevent the mini-infobar from appearing on mobile
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        //   e.userChoice.then(res => console.log(res));
        // Update UI notify the user they can install the PWA
        showInstallPromotion();
        // Optionally, send analytics event that PWA install promo was shown.
        console.log(`'beforeinstallprompt' event was fired.`);
    });
</script>
