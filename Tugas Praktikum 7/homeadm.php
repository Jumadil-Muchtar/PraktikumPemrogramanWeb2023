<?php
require_once('config/base.php');
require_once('config/connection.php');
session_start();

if (!isset($_SESSION["login"])){
  header("Location: " . BASE_URL . 'login.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
  </head>

<body>
  <div class="container">
  
  <!-- <p><a href="#" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover"
  style="background-color: red; padding: auto;">Emphasis link</a></p> -->

    
    <!-- <button type="button" class="btn btn-danger mt-4 btn-logout">
      Log Out
    </button> -->
    <h3 class="text-center mt-4 mb-4">Data Mahasiswa</h3>
    <a href="logout.php" class="btn btn-danger mb-2 btn-logout">Logout</a>
    <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
      Tambah
    </button> 
    <div class="card">
      <!-- <div class="card-header bg-primary text-white">
        Data Mahasiswa
      </div> -->
      <div class="card-body">        
        <table class="table table-bordered table-hover">
          <tr>
            <th class="table-secondary">No.</th>
            <th class="table-secondary">NIM</th>
            <th class="table-secondary">Nama Lengkap</th>
            <th class="table-secondary">Program Studi</th>
            <th class="table-secondary">Jenis Kelamin</th>
            <th class="table-secondary">Alamat</th>
            <th class="table-secondary">Username</th>      
            <th class="table-secondary">Aksi</th>
          </tr>

          <?php
          //persiapan menampilkan data
          $no = 1;
          $tampil = mysqli_query($connection, "SELECT * FROM datamahasiswa ORDER BY nim");
          while ($data = mysqli_fetch_array($tampil)):
          ?>
            <tr>
              <td>
                <?= $no++ ?>
              </td>
              <td>
                <?= $data['nim'] ?>
              </td>
              <td>
                <?= $data['namaLengkap'] ?>
              </td>
              <td>
                <?= $data['prodi'] ?>
              </td>
              <td>
                <?= $data['jenisKelamin'] ?>
              </td>
              <td>
                <?= $data['alamat'] ?>
              </td>
              <td>
                <?= $data['username'] ?>
              </td>
              <td>
                <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                  data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                  data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
              </td>
            </tr>

            <!-- Ubah data -->        
            <div class="modal fade modal-lg" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
              tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content px-3" >
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form method="POST" action="controller/update.php">                  
                    <div class="mb-3">
                      <label class="form-label">NIM</label>
                      <input type="text" class="form-control" name="tnim" value="<?= $data['nim'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="tnama" value="<?= $data['namaLengkap'] ?>"
                        placeholder="Masukkan Nama lengkap anda!">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Program Studi</label>
                      <select class="form-select" name="tprodi">
                        <option value="<?= $data['prodi'] ?>">
                          <?= $data['prodi'] ?>
                        </option>
                        <option value="Matematika">Matematika</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Kimia">Kimia</option>
                        <option value="Biologi">Biologi</option>
                        <option value="Statistika">Statistika</option>
                        <option value="Geofisika">Geofisika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Aktuaria">Aktuaria</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <select class="form-select" name="tkelamin">
                        <option value="<?= $data['jenisKelamin'] ?>">
                          <?= $data['jenisKelamin'] ?>
                        </option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Alamat</label>
                      <input type="text" class="form-control" name="talamat" value="<?= $data['alamat'] ?>"
                        placeholder="Masukkan alamat baru">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" name="tusername" value="<?= $data['username'] ?>" disabled>
                    </div>                  

                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" name="submitubah" value="Ubah"></input>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            <!-- Ubah Data -->

            <!-- Hapus data -->
            <div class="modal fade modal-lg" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
              tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="controller/delete.php">
                    <input type="hidden" name="nim" value="<?= $data['nim'] ?>">
                    <div class="modal-body">
                      <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                        <span class="text-danger">
                          <?= $data['nim'] ?> -
                          <?= $data['namaLengkap'] ?>
                        </span>
                      </h5>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" name="submithapus" value="Ya, Hapus!"></input>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Hapus Data -->
          <?php endwhile; ?>
        </table>



        <!-- Tambah data -->
        <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form method="POST" action="controller/create.php">
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="tnim" placeholder="Masukkan NIM" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="tnama" placeholder="Masukkan nama lengkap" required>
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select class="form-select" name="tprodi" required>
                      <option></option>
                      <option value="Matematika">Matematika</option>
                      <option value="Fisika">Fisika</option>
                      <option value="Kimia">Kimia</option>
                      <option value="Biologi">Biologi</option>
                      <option value="Statistika">Statistika</option>
                      <option value="Geofisika">Geofisika</option>
                      <option value="Sistem Informasi">Sistem Informasi</option>
                      <option value="Aktuaria">Aktuaria</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="tkelamin" required>
                      <option></option>
                      <option value="Laki-laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="talamat" placeholder="Masukkan alamat" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="tusername" placeholder="Masukkan username" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" name="submitsimpan" value="Simpan"></input>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Perubahan Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h4>Data berhasil disimpan</h4>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary">Oke</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="failedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Perubahan Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h4>Data gagal disimpan</h4>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary">Oke</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Tambah Data -->


      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous">
  </script>

  <script>
    document.querySelector(".btn-logout").addEventListener("click", function () {
      // Mengarahkan pengguna kembali ke halaman login
      window.location.href = "login.php"; // Ganti "login.php" sesuai dengan alamat halaman login Anda
    });
  </script>>
</body>
</html>