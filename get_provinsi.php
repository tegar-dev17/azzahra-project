<?php
$url = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    die('Error occurred during cURL execution. ' . curl_error($ch));
}

curl_close($ch);

$data = json_decode($response, true);

// Cek jika respon adalah JSON yang valid
if ($data && is_array($data) && array_key_exists('provinsi', $data)) {
    $provinsiList = $data['provinsi'];
} else {
    echo 'Gagal mendapatkan data provinsi.';
    $provinsiList = [];
}

echo '<select class="form-control" name="provinsi">';
echo '<option value="" selected disabled>Pilih Provinsi</option>';

foreach ($provinsiList as $provinsi) {
    echo '<option value="' . $provinsi['nama'] . '">' . $provinsi['nama'] . '</option>';
}

echo '</select>';
