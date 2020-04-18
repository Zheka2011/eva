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
{{-- {{ dd(ruDate(Carbon\Carbon::now()))}} --}}
    <tbody>
      @foreach ($orders as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->provisioner }}</td>
          <td>{{ ruDate($order->date_of_receiving) }}</td>
          <td>{{ $order->order_cost }}</td>
          <td>{{ $order->shipper}}</td>
          <td>{{ $order->cost_of_delivery}}</td>
          <td>{{ $order->order_cost + $order->cost_of_delivery }}</td>
          <td>{{ $order->comment}}</td>
        </tr>
      @endforeach

    </tbody>
  </table>
  {{ $orders->links() }}
</div>
<hr>
<form action="{{ route('ord_add') }}" method="post">
  @csrf

    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="provisioner">Поставщик</label>
      <div class="col-sm-6">
        <input type="text" name="provisioner" value="" id="provisioner" placeholder="" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="date_of_receiving">Дата заказа</label>
      <div class="col-sm-6">
        <input type="date" name="date_of_receiving" value="" id="date_of_receiving"  class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="shipper">Перевозчик</label>
      <div class="col-sm-6">
        <input type="text" name="shipper" value="" id="shipper" placeholder="" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="cost_of_delivery">Стоимость доставки</label>
      <div class="col-sm-6">
        <input type="text" name="cost_of_delivery" value="" id="cost_of_delivery" placeholder="" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="comment">Комментарий</label>
      <div class="col-sm-6">
        <input type="textarea" name="comment" value="" id="comment" placeholder="" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-8">
        <button type="submit" class="btn btn-success" >Отправить</button>
      </div>
    </div>

</form>