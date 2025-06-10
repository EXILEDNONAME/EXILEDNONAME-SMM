<li class="menu-section">
  <h4 class="menu-text"> Main </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item {{ (request()->is('dashboard/orders*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/orders') }}" class="menu-link"><i class="menu-icon fas fa-cart-plus"></i><span class="menu-text"> Orders </span></a></li>
<li class="menu-item {{ (request()->is('dashboard/products*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/products') }}" class="menu-link"><i class="menu-icon fas fa-box-open"></i><span class="menu-text"> Products </span></a></li>
<li class="menu-item {{ (request()->is('dashboard/transactions*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/transactions') }}" class="menu-link"><i class="menu-icon fas fa-exchange-alt"></i><span class="menu-text"> Transactions </span></a></li>
