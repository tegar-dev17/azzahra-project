<?php include 'pages/header.php'; ?>
<div class="container mx-auto mt-8 p-8 bg-white rounded shadow-lg">
    <h1 class="text-4xl font-bold mb-4 text-center text-blue-900" style="text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);">Hubungi <font class="text-red-500">Kami</font>
    </h1>

    <!-- Formulir Kontak -->
    <form action="proses_formulir.php" method="POST" id="myForm">
        <!-- Field Nama -->
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold">Nama:</label>
            <input type="text" id="nama" name="nama" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Field Email -->
        <div class="mb-4">
            <label for="no_hp" class="block text-gray-700 text-sm font-bold">Nomor WhatsApp :</label>
            <input type="no_hp" id="no_hp" name="no_hp" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Field Pesan -->
        <div class="mb-4">
            <label for="pesan" class="block text-gray-700 text-sm font-bold">Pesan:</label>
            <textarea id="pesan" name="pesan" rows="4" class="w-full p-2 border border-gray-300 rounded"></textarea>
        </div>
        <!-- Tombol Kirim -->
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Kirim</button>
    </form>
    <div class="mt-4 flex">
        <div class="mr-4">
            <img src="dist/img/hubungi.png" alt="Ilustrasi Hubungi Kami" class="w-3/4 h-auto hidden md:flex">
        </div>
        <div class="mt-4">
            <p class="text-4xl font-sans font-bold sm1:text-base text-blue-900">Temukan Kami Di Media Sosial ! </p>

            <!-- Facebook -->
            <div class="flex items-center mt-2 text-2xl">
                <i class="fab fa-facebook text-blue-500 mr-1"></i>
                <a href="https://www.facebook.com/RUMAHSAKITAZZAHRA/?locale=id_ID" target="_blank" class="text-blue-500 hover:underline font-bold">Facebook</a>
            </div>

            <!-- Instagram -->
            <div class="flex items-center mt-2 text-2xl">
                <i class="fab fa-instagram text-pink-500 mr-1"></i>
                <a href="https://www.instagram.com/rs.azzahraofficial/" target="_blank" class="text-pink-500 hover:underline font-bold">Instagram</a>
            </div>

            <!-- WhatsApp -->
            <div class="flex items-center mt-2 text-2xl">
                <i class="fab fa-whatsapp text-green-500 mr-1"></i>
                <a href="https://wa.me/6282388797008" target="_blank" class="text-green-500 hover:underline font-bold">WhatsApp</a>
            </div>
        </div>
    </div>
</div>
<?php include 'pages/footer.php'; ?>