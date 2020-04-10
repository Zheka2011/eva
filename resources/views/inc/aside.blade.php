@section('aside')
{{-- <div class="wrapper"> --}}
  <nav class="sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('dash')}}"><i class="fas fa-chart-line"></i> Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sellings')}}"><i class="fas fa-dollar-sign"></i> Продажи</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('orders')}}"><i class="fas fa-people-carry"></i> Поставки</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('storage')}}"><i class="fas fa-pallet"></i> Склад</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('exps') }}"><i class="fas fa-dollar-sign"></i> Расходы</a>
        </li>

        @role('superadmin')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users')}}"><i class="fas fa-users"></i> Пользователи</a>
        </li>
        @endrole

      </ul>
    </div>
  </nav>
{{-- </div> --}}