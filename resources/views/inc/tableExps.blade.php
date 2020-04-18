
<h1 class="mt-5">Расходы</h1>
<div class="table-responsive ">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
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
          <td>{{ $exp->contractor }}</td>
          <td>{{ $exp->cost }}</td>
          <td>{{ ruDate($exp->date_start) }}</td>
          <td>{{ ruDate($exp->date_end) }}</td>
          <td>{{ $exp->categoryExps->name}}</td>
          <td>{{ $exp->comment }}</td>
        </tr>
      @endforeach

    </tbody>
  </table>
  {{ $exps->links() }}
</div>
<hr>
<form action="{{ route('addExps') }}" method="post">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm" for="contractor">Контрагент</label>
    <div class="col-sm-6">
      <input type="text" name="contractor" value="" id="contractor" placeholder="" class="form-control" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm" for="cost">Сумма</label>
    <div class="col-sm-6">
      <input type="number" name="cost" value="" id="cost" placeholder="" class="form-control" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm" for="date_start">Дата начала</label>
    <div class="col-sm-6">
      <input type="date" name="date_start" value="" id="date_start"  class="form-control" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm" for="date_end">Дата окончания</label>
    <div class="col-sm-6">
      <input type="date" name="date_end" value="" id="date_end" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm" for="id_category_exps">Категория</label>
    <div class="col-sm-6">
      <select class="form-control custom-select " name="id_category_exps" id="id_category_exps">
        @foreach($categorys as $category)
          <option value="{{ $category->id }}">
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label col-form-label-sm" for="comment">Комментарий</label>
    <div class="col-sm-6">
      <input type="text" name="comment" value="" id="comment" placeholder="" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-8">
      <button type="submit" class="btn btn-success" >Отправить</button>
    </div>
  </div>
</form>