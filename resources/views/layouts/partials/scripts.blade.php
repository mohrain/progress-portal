<script type="text/javascript" src="{{ asset('assets/mdb/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/mdb/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/mdb/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/mdb/js/mdb.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/mdb/js/addons/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/nepali.datepicker.v3.min.js') }}" type="text/javascript"></script>
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