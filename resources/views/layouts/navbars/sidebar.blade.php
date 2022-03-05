<div class="sidebar-container">
    <div class="sidebar-logo">
      TOP CARS
    </div>
    <ul class="sidebar-navigation">
      <li class="header">Cars Info</li>
      <li>
        <a href="{{ route('admin.home') }}">
            <i class="fas fa fa-tachometer-alt" aria-hidden="true"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('categories.index') }}">
            <i class="fas fa fa-car-battery"></i> Categories
        </a>
      </li>
      <li>
        <a href="{{ route('cars.index') }}">
            <i class="fas fa fa-car"></i> Cars
        </a>
      </li>
      <li>
        <a href="{{ route('carsinfo.index') }}">
            <i class="fas fa fa-parking"></i> Rented Cars Info
        </a>
      </li>
      <li>
        <a href="{{ route('invoiceinfo.index') }}">
            <i class="fas fa fa-file-invoice-dollar"></i> Invoices
        </a>
      </li>
      <li>
      <a href="{{ route('contact.index') }}">
        <i class="fas fa-envelope-open-text"></i> Message
      </a>
    </li>
      <li class="header">Users Info</li>

      <li>
        <a href="#">
            <i class="fas fa fa-users"></i> Users
        </a>
      </li>
    </ul>
  </div>
