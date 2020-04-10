
<h1 class="mt-5">Расходы</h1>
<div class="table-responsive ">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Наименование</th>
        <th>Контрагент</th>
        <th>Сумма</th>
        <th>Дата начала</th>
        <th>Дата окончания</th>
        <th>Категория</th>
        <th>Комментарий</th>
      </tr>
    </thead>
    <tbody>
      {{-- {{dd($exps)}} --}}
      @foreach ($exps as $exp)
        <tr>
          <td>{{ $exp->id }}</td>
          <td>{{ $exp->name }}</td>
          <td>{{ $exp->contractor }}</td>
          <td>{{ $exp->cost }}</td>
          <td>{{ $exp->date_start }}</td>
          <td>{{ $exp->date_end }}</td>
          <td>{{ $exp->categoryExps->name}}</td>
          <td>{{ $exp->comment }}</td>
        </tr>
      @endforeach

    </tbody>
  </table>
  {{ $exps->links() }}
</div>

<form action="{{ route('addExps') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">
      <input type="text" name="name" value="" id="name" placeholder="Название" class="form-control">
    </label>
    <label for="contractor">
      <input type="text" name="contractor" value="" id="contractor" placeholder="Контрагент" class="form-control">
    </label>
    <label for="cost">
      <input type="number" name="cost" value="" id="cost" placeholder="Сумма" class="form-control">
    </label>
    <label for="date_start">
      <input type="date" name="date_start" value="" id="date_start"  class="form-control">
    </label>
    <label for="date_end">
      <input type="date" name="date_end" value="" id="date_end" class="form-control">
    </label>
    <label for="id_category_exps">
      <select class="form-control custom-select " name="id_category_exps" id="id_category_exps">
        @foreach($categorys as $category)
          <option value="{{ $category->id }}">
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </label>
    <label for="comment">
      <input type="text" name="comment" value="" id="comment" placeholder="Комментарий" class="form-control">
    </label>
    <button type="submit" class="btn btn-success" >Отправить</button>
  </div>
</form>