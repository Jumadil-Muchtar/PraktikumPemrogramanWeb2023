<!DOCTYPE html>
<html>
<head>
    <title>Informasi Jadwal Interview Pelamar</title>
</head>
<body>
    <h1>Selamat! Anda lulus tahap Administrasi.</h1>
    <p>Eamil ini adalah konfirmasi bahwa data pendaftaran Anda telah diterima. Berikut adalah detail jadwal interview Anda:</p>

    <ul>
        <li><strong>Tanggal Interview :</strong> {{ $interview->tgl_interview }}</li>
        <li><strong>Jam Interview :</strong> {{ $interview->jam_interview }}</li>
        <!-- Anda dapat menambahkan informasi lain sesuai kebutuhan -->
    </ul>

    <p>Pastikan Anda bersiap dengan baik untuk mengikuti interview. Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau keperluan tambahan.</p>

    <p>Terima kasih atas perhatiannya.</p>
</body>
</html>
