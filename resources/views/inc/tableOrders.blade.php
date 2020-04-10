<h1 class="mt-5">Поставки материала</h1>
<div class="table-responsive ">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Поставщик</th>
        <th>Дата поставки</th>
        <th>Стоимость заказа</th>
        <th>Грузоперевозчик</th>
        <th>Стоимость доставки</th>
        <th>Общая стоимость заказа</th>
        <th>Комментарий</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->provisioner }}</td>
          <td>{{ \Carbon\Carbon::parse($order->date_of_receiving)->format('j F Y г.') }}</td>
          <td>{{ $order->order_cost }}</td>
          <td>{{ $order->shipper}}</td>
          <td>{{ $order->cost_of_delivery}}</td>
          <td>{{ $order->order_cost + $order->cost_of_delivery }}</td>
          <td>{{ $order->comment}}</td>
          <td>
            {{-- <form action="{{ route('mat_del') }}" method="post">
              @csrf
              <input type="hidden" name="id_del" value="{{ $order->id }}" >
              <button type="submit" class="btn btn-danger">Удалить</button>
            </form> --}}
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
  {{ $orders->links() }}
</div>

<form action="{{ route('ord_add') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="provisioner">
      <input type="text" name="provisioner" value="" id="provisioner" placeholder="Введите поставщика" class="form-control">
    </label>
    <label for="date_of_receiving">
      <input type="date" name="date_of_receiving" value="" id="date_of_receiving"  class="form-control">
    </label>
    <label for="shipper">
      <input type="text" name="shipper" value="" id="shipper" placeholder="Введите перевозчика" class="form-control">
    </label>
    <label for="cost_of_delivery">
      <input type="text" name="cost_of_delivery" value="" id="cost_of_delivery" placeholder="Введите стоимость доставки" class="form-control">
    </label>
    <label for="comment">
      <input type="textarea" name="comment" value="" id="comment" placeholder="Введите комментарий" class="form-control">
    </label>
    <button type="submit" class="btn btn-success" >Отправить</button>
  </div>
</form>