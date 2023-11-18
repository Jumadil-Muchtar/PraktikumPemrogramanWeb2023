<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: black;">
   <div class="container">
      <a class="navbar-brand" href="/home">ClassicModels</a>         
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="navbar-nav">
            <a class="nav-link" href="/home">Home</a>
            <a class="nav-link" href="/product">Products</a>
            {{-- <a class="nav-link {{ ($title === "Product") ? 'active' : '' }}" href="/product">Products</a> --}}
         </div>
      </div>
      <form class="d-flex mt-3 search" role="search" action="{{ route('products.search') }}" method="GET">
         <input class="form-control me-2" type="search" placeholder="Search by Product Lines" aria-label="Search" name="productLine">
         <button class="btn btn-outline-secondary" type="submit">Search</button>
      </form>
   </div>
</nav>