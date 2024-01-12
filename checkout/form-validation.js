// JavaScript hogy ne menjenek be olyan kérések, amik érvénytelen mezőket tartalmaznak
(function () {
  'use strict'

  // Fetcheljük a formokat amire custom Bootstrap stlye vlidációt szeretnénk
  var forms = document.querySelectorAll('.needs-validation');

  // Loop, hogy megelőzzük az érvénytelen beküldést
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')

      }, false)
    })
})()
