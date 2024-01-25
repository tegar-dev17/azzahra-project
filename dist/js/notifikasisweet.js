$(document).ready(function ($) {
    $("#myForm").submit(function (e) {
        e.preventDefault();

        // Simpan referensi ke formulir
        var form = $(this);

        // Lakukan pengiriman formulir menggunakan AJAX
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    // Tampilkan notifikasi sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: response.message,
                    });

                    // Perbarui nilai pada badge notifikasi
                    var notificationBadge = $("#notification-badge");
                    var currentCount = parseInt(notificationBadge.text());
                    notificationBadge.text(currentCount + 1);

                    // Reset nilai kolom input menjadi kosong
                    form.find('input, textarea').val('');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    });
                }
            },
            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan: ' + error.responseText,
                });
            }
        });
    });
});
