<h3 class="mt-5">{{ $selMQ->model }}, {{ ruDate($selMQ->date_of_sell) }}</h3>
<div class="table-responsive ">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Материал</th>
        <th>Количество</th>
        <th>Cебестоимость</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($selMQ->selMat as $id => $sel)
        <tr>
          <td>{{ $selMQ->selMQ[$id]->id }}</td>
          <td>{{ $sel->name }}</td>
          <td>{{ $selMQ->selMQ[$id]->quantum }}</td>
          <td>{{ $selMQ->selMQ[$id]->cost_quantum }}</td>
        </tr>
      @endforeach

    </tbody>

  </table>
  {{-- {{ $sellings->links() }} --}}
</div>
<hr>
<form action="{{ route('selAddMQ',['id'=>$selMQ->id]) }}" method="post">
  @csrf
  <div class="form-group">
    <label for="id_material">
      <select class="form-control custom-select " name="id_material" id="id_material">
        @foreach($materials as $material)
          <option value="{{ $material->id }}">
            {{ $material->name }} {{ $material->color }}, {{ $material->total_volume }}{{ $material->unit }}
          </option>
        @endforeach
      </select>
    </label>
    <label for="quantum">
      <input type="number" name="quantum" value="" id="quantum" placeholder="Количество" class="form-control" step="any">
    </label>
    {{-- <label for="cost_quantum">
      <input type="text" name="cost_quantum" value="" id="cost_quantum" disabled placeholder="Рассчитается автоматически" class="form-control">
    </label> --}}
    <button type="submit" class="btn btn-success" >Отправить</button>
  </div>
</form>