<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="height: 100%;">

    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home')?'active':'' }}" aria-current="page">
          Home
        </a>
      </li>

      <li>
        <a href="{{ route('customer.index') }}" class="nav-link link-dark {{ request()->routeIs('customer*')?'active':'' }}">
            Customers
        </a>
      </li>
      <li>
        <a href="{{ route('product.index') }}" class="nav-link link-dark {{ request()->routeIs('product*')?'active':'' }}">
          Products
        </a>
      </li>
      <li>
        <a href="{{ route('order.index') }}" class="nav-link link-dark {{ request()->routeIs('order*')?'active':'' }}">
          Orders
        </a>
      </li>
    </ul>
    <hr>

  </div>
