

<h1 class="mt-5">Отсатки материала</h1>
<div class="table-responsive ">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Материал</th>
        <th>Цвет</th>
        <th>Количество</th>
        <th>Объем(остаток)</th>
        <th>Стоимость за ед. у поставщика</th>
        <th>Себестоимость(с доставкой)</th>
        <th>Поставка</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($materials as $material)
        <tr>
          <td>{{ $material->id }}</td>
          <td>{{ $material->name }}</td>
          <td>{{ $material->color }}</td>
          <td>{{ $material->amt }}</td>
          <td @if($material->total_volume/$material->volume < 2)
            class="alert alert-danger"
            @elseif($material->total_volume/$material->volume < 5)
            class="alert alert-warning"
          @endif>{{ $material->total_volume }} {{ $material->unit }}</td>
          <td>{{ $material->unit_cost }}</td>
          <td>{{ $material->cost_price }}</td>
          <td>{{ $material->orderOnMaterials->provisioner }}, {{ $material->orderOnMaterials->date_of_receiving }}</td>
          <td>
            <form action="{{ route('mat_del') }}" method="post">
              @csrf
              <input type="hidden" name="id_del" value="{{ $material->id }}" >
              <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
            </form>
          </td>
        </tr>
      @endforeach

    </tbody>

  </table>
  {{ $materials->onEachSide(5)->links() }}

</div>

<form action="{{ route('stored') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">
      <input type="text" name="name" value="" id="name" placeholder="Введите название" class="form-control">
    </label>
    <label for="color">
      <input type="text" name="color" value="" id="color" placeholder="Введите цвет" class="form-control">
    </label>
    <label for="amt">
      <input type="number" name="amt" value="" id="amt" placeholder="Введите количество, шт" class="form-control">
    </label>
    <label for="volume">
      <input type="number" name="volume" value="" id="volume" placeholder="Введите размерность 1 ед." class="form-control" step="any">
    </label>
    <label for="unit">
      <input type="text" name="unit" value="" id="unit" placeholder="Введите ед. измерения" class="form-control">
    </label>
    <label for="unit_cost">
      <input type="number" name="unit_cost" value="" id="unit_cost" placeholder="Введите стоимость за ед." class="form-control" step="any">
    </label>
    <label for="order_id">
      <select class="form-control custom-select " name="order_id" id="order_id">
        @foreach($orders as $order)
          <option value="{{ $order->id }}">
            {{ $order->provisioner}}, {{ $order->date_of_receiving}}
          </option>
        @endforeach
      </select>
    </label>
    <button type="submit" class="btn btn-success" >Отправить</button>
  </div>
</form>