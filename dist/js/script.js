//navbar fixed
// window.onscroll = function() {
//     const header = document.querySelector('header');
//     const fixedNav = header.offsetTop;

//     if(window.pageYOffset > fixedNav) {
//         header.classList.add('navbar-fixed');
//     } else {
//         header.classList.remove('navbar-fixed');
//     }
// };
// Import SweetAlert styles
import 'sweetalert2/dist/sweetalert2.min.css';

// Import SweetAlert library
import Swal from 'sweetalert2';

// Contoh penggunaan SweetAlert setelah mengirim formulir
$("#myForm").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: $(this).attr("action"),
        data: $(this).serialize(),
        success: function (response) {
            // Tampilkan SweetAlert sukses
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: 'Data berhasil disimpan.',
            });
        },
        error: function (error) {
            // Tampilkan SweetAlert error
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan: ' + error.responseText,
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
  const button = document.getElementById('navbar-toggle');
  const menu = document.getElementById('navbar-dropdown');

  const dropdownButton = document.getElementById('dropdownNavbarLink');
  const dropdownMenu = document.getElementById('dropdownNavbar');

  const doubleDropdownButton = document.getElementById('doubleDropdownButton');
  const doubleDropdown = document.getElementById('doubleDropdown');

  dropdownButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
  });

  doubleDropdownButton.addEventListener('click', () => {
    doubleDropdown.classList.toggle('hidden');
  });

  button.addEventListener('click', function () {
    menu.classList.toggle('hidden');
  });
});
  document.addEventListener("DOMContentLoaded", function () {
    var videoiklan = document.getElementById("videoiklan");

    // Show the popup
    function showPopup() {
        videoiklan.style.display = "block";
        animatePopup();
    }

    // Animate the popup
    function animatePopup() {
        var position = 0;
        var animationInterval = setInterval(function () {
            if (position < 50) {
                position += 0; // Adjust the speed of the animation here
                videoiklan.style.bottom = position + "px";
            } else {
                clearInterval(animationInterval);
            }
        }, 10); // Adjust the interval of the animation here
    }

    // Call the showPopup function after a delay (e.g., 2000 milliseconds)
    setTimeout(showPopup, 2000); // Adjust the delay before the popup appears here
});
var img = document.getElementById('img1');
img.style.transition = 'opacity 0.1s';
img.style.opacity = 0;
// fade in the image after 1 second
setTimeout(function() {
  img.style.opacity = 1;
}, 1000);
