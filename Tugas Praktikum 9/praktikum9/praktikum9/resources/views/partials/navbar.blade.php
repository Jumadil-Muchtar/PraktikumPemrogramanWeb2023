<nav class="navbar navbar-expand-lg bg-danger py-4 px-5">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4 text-white" href="/">Ojan Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white fw-medium {{ Request::is('/') ? 'active' : '' }}]" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white fw-medium {{ Request::is('/') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('category.products', 'Foods') }}">Food</a></li>
              <li><a class="dropdown-item" href="{{ route('category.products', 'Drinks') }}">Drink</a></li>
              <li><a class="dropdown-item" href="{{ route('category.products', 'T-Shirts') }}">T-shirt</a></li>
              <li><a class="dropdown-item" href="{{ route('category.products', 'Shirts') }}">Shirt</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('category.products', 'Cars') }}">Car</a></li>
              <li><a class="dropdown-item" href="{{ route('category.products', 'Motorcycles') }}">Motorcycle</a></li>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li><a href="{{ route('products.create') }}" class="nav-link text-white fw-medium"><i class="bi bi-plus-square-fill"></i> Add New Product</a></li>
        </ul>
      </div>
    </div>
  </nav>