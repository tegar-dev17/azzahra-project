<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Alamat email tujuan
    $tujuan = "tujuan@example.com";

    // Subjek email
    $subjek = "Test Email";

    // Isi pesan email
    $pesan = "Ini adalah pesan uji coba.";

    $mail->setFrom('pengirim@example.com', 'Nama Pengirim');
    $mail->addAddress($tujuan);
    $mail->Subject = $subjek;
    $mail->Body = $pesan;

    // Kirim email
    $mail->send();
    echo "Email berhasil terkirim.";
} catch (Exception $e) {
    echo "Email gagal terkirim. Pesan error: {$mail->ErrorInfo}";
}
