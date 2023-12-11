<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siloam Hospital</title>
    {{-- Bootstrap --}}
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    {{-- css --}}
    <style>

        .card-container {
  width: 300px;
  height: 400px;
  position: relative;
  border-radius: 10px;
}

.card-container::before {
  content: "";
  z-index: -1;
  position: absolute;
  inset: 0;
  background: linear-gradient(-45deg, #001B79 0%, #03C988 100% );
  transform: translate3d(0, 0, 0) scale(0.95);
  filter: blur(20px);
}

.card {
  width: 100%;
  height: 100%;
  border-radius: inherit;
  overflow: hidden;
}

.card .img-content {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(-45deg, #001B79 0%, #03C988 100% );
  transition: scale 0.6s, rotate 0.6s, filter 1s;
}

.card .img-content svg {
  width: 50px;
  height: 50px;
  fill: #212121;
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.card .content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 10px;
  color: #e8e8e8;
  padding: 20px 24px;
  line-height: 1.5;
  border-radius: 5px;
  opacity: 0;
  pointer-events: none;
  transform: translateY(50px);
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.card .content .heading {
  font-size: 32px;
  font-weight: 700;
}

.card:hover .content {
  opacity: 1;
  transform: translateY(0);
}

.card:hover .img-content {
  scale: 2.5;
  rotate: 30deg;
  filter: blur(7px);
}

.card:hover .img-content svg {
  fill: transparent;
}

.Btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: 0.3s;
  box-shadow: 2px 2px 10px hsl(160, 97%, 40%);
  background-color: rgb(0, 27, 122);
}

/* plus sign */
.sign {
  width: 100%;
  transition-duration: 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sign svg {
  width: 18px;
}

.sign svg path {
  fill: #03C988;
}
/* text */
.text {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: #03C988;
  font-size: 1.2em;
  font-weight: 600;
  transition-duration: 0.3s;
}
/* hover effect on button width */
.Btn:hover {
  width: 125px;
  border-radius: 40px;
  transition-duration: 0.3s;
}

.Btn:hover .sign {
  width: 30%;
  transition-duration: 0.3s;
  padding-left: 20px;
}
/* hover effect button's text */
.Btn:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: 0.3s;
  padding-right: 10px;
}
/* button click effect*/
.Btn:active {
  transform: translate(2px, 2px);
}

.form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 350px;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  position: relative;
}

.message {
  color: rgba(88, 87, 87, 0.822);
  font-size: 14px;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 5px;
}

.form label .input + span {
  position: absolute;
  left: 10px;
  top: 15px;
  color: grey;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 15px;
  font-size: 0.9em;
}

.form label .input:focus + span,.form label .input:valid + span {
  top: 30px;
  font-size: 0.7em;
  font-weight: 600;
}

.form label .input:valid + span {
  color: green;
}

.input01 {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 5px;
}

.form label .input01 + span {
  position: absolute;
  left: 10px;
  top: 50px;
  color: grey;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input01:placeholder-shown + span {
  top: 40px;
  font-size: 0.9em;
}

.form label .input01:focus + span,.form label .input01:valid + span {
  top: 50px;
  font-size: 0.7em;
  font-weight: 600;
}

.form label .input01:valid + span {
  color: green;
}

.fancy {
  background-color: transparent;
  border: 2px solid #cacaca;
  border-radius: 0px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-weight: 390;
  letter-spacing: 2px;
  margin: 0;
  outline: none;
  overflow: visible;
  padding: 8px 30px;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  transition: all 0.3s ease-in-out;
  user-select: none;
  font-size: 13px;
}

.fancy::before {
  content: " ";
  width: 1.7rem;
  height: 2px;
  background: #cacaca;
  top: 50%;
  left: 1.5em;
  position: absolute;
  transform: translateY(-50%);
  transform: translateX(230%);
  transform-origin: center;
  transition: background 0.3s linear, width 0.3s linear;
}

.fancy .text {
  font-size: 1.125em;
  line-height: 1.33333em;
  padding-left: 2em;
  display: block;
  text-align: left;
  transition: all 0.3s ease-in-out;
  text-transform: lowercase;
  text-decoration: none;
  color: #818181;
  transform: translateX(30%);
}

.fancy .top-key {
  height: 2px;
  width: 1.5625rem;
  top: -2px;
  left: 0.625rem;
  position: absolute;
  background: white;
  transition: width 0.5s ease-out, left 0.3s ease-out;
}

.fancy .bottom-key-1 {
  height: 2px;
  width: 1.5625rem;
  right: 1.875rem;
  bottom: -2px;
  position: absolute;
  background: white;
  transition: width 0.5s ease-out, right 0.3s ease-out;
}

.fancy .bottom-key-2 {
  height: 2px;
  width: 0.625rem;
  right: 0.625rem;
  bottom: -2px;
  position: absolute;
  background: white;
  transition: width 0.5s ease-out, right 0.3s ease-out;
}

.fancy:hover {
  color: white;
  background: #cacaca;
}

.fancy:hover::before {
  width: 1.5rem;
  background: white;
}

.fancy:hover .text {
  color: white;
  padding-left: 1.5em;
}

.fancy:hover .top-key {
  left: -2px;
  width: 0px;
}

.fancy:hover .bottom-key-1,
 .fancy:hover .bottom-key-2 {
  right: 0;
  width: 0;
}




    </style>
    
</head>
<body>
    {{-- Navbar Sex Start --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" style="width: 200px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Layanan Kesehatan
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
              @csrf
              <button class="Btn" type="button" onclick="confirmLogout()" style="margin:8px;">
                  <div class="sign">
                      <svg viewBox="0 0 512 512">
                          <path
                              d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
                          ></path>
                      </svg>
                  </div>
                  <div class="text">Logout</div>
              </button>
          </form>
          
          <script>
              function confirmLogout() {
                  if (confirm('Are you sure you want to logout?')) {
                      document.getElementById('logoutForm').submit();
                  }
              }
          </script>
          
          </div>
        </div>
      </nav>
    </form>
      {{-- Navbar Sex End --}}
      {{-- Carrousel Start --}}
      <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="img/patient3.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="img/patient2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/patient.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      {{-- Carrousel End --}}
      <section style="background-color: #f7f7f7; padding:0.5rem;">
        <div class="" id="counter-bar" style="margin-top: 2rem; display:flex; flex-direction:inherit;">
          <div style="display: flex; flex-direction:row; padding:0 2rem;">
            <h1 style="margin-left: 5%; color:#001B79; font-size: 50px;">41+</h1> 
            <p style="font-size: 20px; padding:8px; ">Rumah Sakit di Seluruh Indonesia</p> 
          </div>
          <div style="display: flex; flex-direction:row; padding:0 2rem;">
            <h1 style="margin-left: 5%; color:#001B79; font-size: 50px;">12.5K+</h1> 
            <p style="font-size: 20px; padding:8px; ">Tenaga Medis</p> 
          </div>
          <div style="display: flex; flex-direction:row; padding:0 2rem;">
            <h1 style="margin-left: 5%; color:#001B79; font-size: 50px;">8.59M+</h1> 
            <p style="font-size: 20px; padding:8px; ">Pasien Dilayani</p> 
          </div>
          <div style="display: flex; flex-direction:row; padding:0 2rem;">
            <h1 style="margin-left: 5%; color:#001B79; font-size: 50px;">400+</h1> 
            <p style="font-size: 20px; padding:8px; ">Mitra Asuransi</p> 
          </div>
        </div>
      </section>

      {{-- Card Start --}}
      <section style="margin-top: 3rem">
        <div class="d-flex justify-content-center">
            <h3 style="color: #001B79">Ketika Pengalaman Bertemu Kepedulian</h3>
        </div>
        <div class="d-flex justify-content-center">
            <p style="color: #03C988">Kami berkomitmen memberikan pelayanan kesehatan unggulan dengan mengutamakan integitas. </p>
        </div>
        <div class="container text-center" style="margin-top: 3rem;">
  <div class="row align-items-end">
    <div class="col">
      <div class="card-container">
            <div class="card">
                <div class="img-content">
                    <img src="img/patientcard1.jpg" alt="">
                </div>
                <div class="content">
                    <p class="heading">Card Hover</p>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipii
                    voluptas ten mollitia pariatur odit, ab
                    minus ratione adipisci accusamus vel est excepturi laboriosam magnam
                    necessitatibus dignissimos molestias.
                    </p>
                </div>
                </div>
            </div>
    </div>
    <div class="col">
      <div class="card-container">
        <div class="card">
            <div class="img-content">
                <img src="img/patientcard2.jpg" alt="">
            </div>
            <div class="content">
                <p class="heading">Card Hover</p>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipii
                voluptas ten mollitia pariatur odit, ab
                minus ratione adipisci accusamus vel est excepturi laboriosam magnam
                necessitatibus dignissimos molestias.
                </p>
            </div>
        </div>
        </div>
    </div>
    <div class="col">
      <div class="card-container">
        <div class="card">
        <div class="img-content">
            <img src="img/patientcard.jpg" alt="">
        </div>
        <div class="content">
            <p class="heading">Card Hover</p>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipii
            voluptas ten mollitia pariatur odit, ab
            minus ratione adipisci accusamus vel est excepturi laboriosam magnam
            necessitatibus dignissimos molestias.
            </p>
        </div>
        </div>
        </div>
    </div>
    <div class="col">
      <div class="card-container">
        <div class="card">
        <div class="img-content">
            <img src="img/patientcard3.jpg" alt="">
        </div>
        <div class="content">
            <p class="heading">Card Hover</p>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipii
            voluptas ten mollitia pariatur odit, ab
            minus ratione adipisci accusamus vel est excepturi laboriosam magnam
            necessitatibus dignissimos molestias.
            </p>
        </div>
        </div>
        </div>
    </div>
  </div>
</div>
      </section>
      {{-- Card End --}}

       {{-- Janji Temu Start--}}
       <section  style="background-color: #f7f7f7; padding:2.5rem; margin-top: 8rem;">
        <div class="d-flex flex-direction-row">
            <div style="margin-left: 5%">
                <h5 style="font-weight: 700; color:#9ca3af">Buat Janji Temu</h5>
                <h2 style="font-size: 40px; font-weight:600; color:#001B79">Sudah Buat Janji Temu?</h2>
                <p style="color: #03C988">Hal yangbisaa Anda lakukan agar kunjungan jadi lebih mudah</p>
            </div>
            <div style="position: relative; padding: 0 2rem 0 3rem;">
                <img src="img/patient4.png" alt="" style="width:400px; height:350px; border-radius:25px;">
                <div style="position: absolute; top: 0; left: 10.5%; width: 83%; height: 100%; background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7)); border-radius: 25px;"></div>
                <h1 style="position: absolute; top: 70%; left: 42%; transform: translate(-50%, -50%); color: white; font-size:30px; font-weight:700;">Download Aplikasi My siloam</h1>
                <a href="" style="position: absolute; top: 85%; left: 36.5%; transform: translate(-50%, -50%); color: #fff; font-weight:600;">Pelajari Aplikasi MySiloam --></a>
            </div>
            <div style="position: relative; width: 400px; height: 350px; overflow: hidden; border-radius: 25px;">
                <img src="img/patient5.png" alt="" style="width:100%; height:100%; border-radius:25px;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7)); border-radius: 25px;"></div>
                <h1 style="position: absolute; top: 75%; left: 31%; transform: translate(-50%, -50%); color: white; font-size: 25px; font-weight: 700;">Kelola Janji Temu</h1>
                <a href="" style="position: absolute; top: 85%; left: 33.5%; transform: translate(-50%, -50%); color: #fff; font-weight: 600; text-decoration: none;">Pelajari Aplikasi MySiloam --></a>
            </div>
      </section>
      {{-- Janji Temu End --}}

      {{-- Contact Start --}}
      <section style="margin-top: 5rem " >
        <div class="d-flex justify-content-center">
            <h2 style="color: #001B79; font-size:35px; font-weight:600">Siloam di Makassar</h2>
        </div>
        <div class="d-flex justify-content-center" style="text-align: center; margin: 0.5rem 5rem">
            <p style="color: #03C988">Temukan berbagai layanan kesehatan berkualitas yang tersebar di seluruh Indonesia melalui daftar Klinik Siloam. Nikmati pelayanan unggul dan fasilitas modern untuk kesehatan optimal bagi Anda dan keluarga. </p>
        </div>
        <div style="display: flex; flex-direction:row; justify-content: center; margin-top:2rem; ">  
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7111077382956!2d119.4056694714885!3d-5.15012156931951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d5032e1dc09%3A0xe750e60511894096!2sSiloam%20Hospitals%20Makassar!5e0!3m2!1sid!2sid!4v1702043311816!5m2!1sid!2sid" width="900" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div>
                <form class="form">
        
                    <div class="flex">
                        <label>
                            <input required="" placeholder="" type="text" class="input">
                            <span>first name</span>
                        </label>
                
                        <label>
                            <input required="" placeholder="" type="text" class="input">
                            <span>last name</span>
                        </label>
                    </div>  
                            
                    <label>
                        <input required="" placeholder="" type="email" class="input">
                        <span>email</span>
                    </label> 
                        
                    <label>
                        <input required="" type="tel" placeholder="" class="input">
                        <span>contact number</span>
                    </label>
                    <label>
                        <textarea required="" rows="3" placeholder="" class="input01"></textarea>
                        <span>message</span>
                    </label>
                    
                    <button class="fancy" href="#">
                      <span class="top-key"></span>
                      <span class="text">submit</span>
                      <span class="bottom-key-1"></span>
                      <span class="bottom-key-2"></span>
                    </button>
                </form>
            </div>
        </div>
      </section>
      {{-- Contact End --}}
      {{-- About Us Start --}}
      <section style="background-color: #001B79; margin-top:4rem;">
          <div style="display: flex; flex-direction:inherit;">
            <div style="padding:4rem;">
              <h3 style="color: #fff;">Tentang Kami</h3>
              <p style="color: #fff;">Overview</p>
              <p style="color: #fff;">History</p>
              <p style="color: #fff;">Achivement</p>
              <p style="color: #fff;">Investor Relationship</p>
              <p style="color: #fff;">CSR program</p>
            </div>
            <div style="padding:4rem;">
              <h3 style="color: #fff;">Untuk Pasien</h3>
              <p style="color: #fff;">Pusat Unggulan</p>
              <p style="color: #fff;">Telekonsultasi</p>
              <p style="color: #fff;">FAQ</p>
              <p style="color: #fff;">Investor Relationship</p>
            </div>
            <div style="padding:4rem ;">
              <h3 style="color: #fff;">Untuk Perusahaan</h3>
              <p style="color: #fff;">Laporan Keuangan</p>
              <p style="color: #fff;">Laporan Tahunan</p>
              <p style="color: #fff;">Corporate Goevernance</p>
              <p style="color: #fff;">Untuk Profesional</p>
            </div>
            <div>
              <div style="padding:4rem;">
                <h3 style="color: #fff; padding:0 1rem;" >Contact Us</h3>
                <div style="display:flex; flex-direction:row;">
                  <a href=""><i class="bi bi-whatsapp" style="color: #fff; padding:1rem;"></i></a>
                  <a href=""><i class="bi bi-instagram" style="color: #fff; padding:1rem;"></i></a>
                  <a href=""><i class="bi bi-facebook" style="color: #fff; padding:1rem;"></i></a>
                  <a href=""><i class="bi bi-youtube" style="color: #fff; padding:1rem;"></i></a>
                </div>
                <div style="margin-top: 5rem">
                  <img src="img/logo.png" alt="">
                </div>
            </div>

            
            </div>
          </div>
      </section>
      {{-- About Us End --}}
      {{-- Footer Start --}}
      
      <footer class="footer" >
        <div class="footer__block block no-margin-bottom" style="background-color: #00114d; padding:0.5rem; ">
          <div class="container-fluid text-center" style="display: flex; flex-direction:row; justify-content:space-between;" >
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
             <p class="no-margin-bottom" style="color: #fff; display:flex; align-items:center;">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net" style="color: #03C988; padding:0.5rem;">Templates Hub</a>.</p>
             <p style="color: #03C988; padding:0.5rem;"> Syarat dan Ketentuan | Kebijakan Privasi</p>
          </div>
        </div>
      </footer>

      {{-- Footer End --}}


      {{-- bootstrap --}}
      <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
</body>
</html>