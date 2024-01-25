<?php include 'koneksi.php'; ?>
<?php include 'pages/header.php'; ?>
<div class="bg-cover sm:w-auto">
    <br><br>
    <section id="Poli" class="pt-10 pb-16 ">
        <div class="w-full px-1">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h1 id="animated-text" onmouseover="addUnderline()" onmouseout="removeUnderline()" class="font-poli font-bold text-blue-900 text-9xl">Layanan <font class="text-primary">Poli</font>
                </h1>
                <p class="text-slate-600 text-center text-lg font-light ">Dedikasi kami dalam penanganan pasien secara profesional dan cepat tanggap juga direalisasikan dengan pengadaan poliklinik spesialis dengan dokter berpengalaman. Dapatkan informasi poliklinik yang sesuai dengan kebutuhan Anda.</p>
            </div>
        </div>
        <?php
        $query_tampil = mysqli_query($conn, "SELECT dokter.nama, dokter.jk, dokter.spesialis, dokter.status, dokter.image, j_dokter.day, j_dokter.start_time, j_dokter.end_time
    FROM dokter
    JOIN j_dokter ON dokter.nama = j_dokter.nama;
") or die(mysqli_error($conn));

        $dokterData = array();

        while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
            $namaDokter = $data_rs['nama'];

            if (!isset($dokterData[$namaDokter])) {
                $dokterData[$namaDokter] = array(
                    'nama' => $data_rs['nama'],
                    'jk' => $data_rs['jk'],
                    'spesialis' => $data_rs['spesialis'],
                    'status' => $data_rs['status'],
                    'image' => $data_rs['image'],
                    'jadwal' => array(),
                );
            }

            $dokterData[$namaDokter]['jadwal'][] = array(
                'day' => $data_rs['day'],
                'start_time' => $data_rs['start_time'],
                'end_time' => $data_rs['end_time'],
            );
        }
        ?>
        <?php foreach ($dokterData as $dokter) : ?>
            <div class="container">
                <div class="w-full px-10 flex flex-wrap justify-center">
                    <div class="mb-12 p-1 md:w-1/7">
                        <div class="rounded-md shadow-lg overflow-hidden bg-slate-200 pt-3 pb-3 pr-3 pl-3 w-40">
                            <div class="rounded-full shadow-2xl shadow-white bg-white overflow-hidden pt-3 pb-3 pr-3 pl-3">
                                <img src="dist/img/kandungan.png" alt="" width="200px">
                            </div>
                            <span class="text-sm"><?= $dokter['nama']; ?></span>
                            <br>
                            <div class="rounded-md bg-blue-950">
                                <h3 class="text-white text-center text-md font-poli font-bold">Poli<br>Kandungan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>


<?php include 'pages/footer.php'; ?>