<nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-4 shadow-lg">
    <div class="container">
      <a class="navbar-brand fw-bold" href="/">Classic <span class="text-danger">Models</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="/products"> Products </a>
      </div>
    </div>
  </nav>