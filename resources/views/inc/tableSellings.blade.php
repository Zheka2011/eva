<h3 class="mt-5">Продажи</h3>
<div class="table-responsive ">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Модель</th>
        <th>Телефон</th>
        <th>Стоимость</th>
        <th>Скидка</th>
        <th>Себестоимость</th>
        <th>Типа прибыль</th>
        <th>Дата продажи</th>
        <th>Мастер</th>
        <th>% мастеру</th>
        <th>Комментарий</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sellings as $selling)
        <tr>
          <td>{{ $selling->id }}</td>
          <td>{{ $selling->model }}</td>
          <td>{{ $selling->contact }}</td>
          <td>{{ $selling->price }}</td>
          <td>{{ $selling->sale }}</td>
          <td>{{ $selling->sum_ss }}</td>
          <td>{{ $selling->price - $selling->sum_ss - $selling->sale }}</td>
          <td>{{ ruDate($selling->date_of_sell) }}</td>
          <td>{{ $selling->userSel->name }}</td>
		      <td>{{ $selling->salary}}</td>
          <td>{{ $selling->comment}}</td>
          <td><a href="{{ route('selMQ', ['id' => $selling->id])}}"><i class="fas fa-edit"></i></a></td>
        </tr>
      @endforeach

    </tbody>

  </table>
  {{ $sellings->links() }}

</div>
<hr>
<form action="{{ route('selAdd') }}" method="post">
  @csrf
  <div id="perSallary"> {{-- используется???? --}}
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="model">Модель</label>
      <div class="col-sm-6">
        <input type="text" name="model" value="" id="model" placeholder="" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="contact">Номер телефона</label>
      <div class="col-sm-6">
        <input type="text" name="contact" value="" id="contact" placeholder=""  class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="price">Стоимость заказа</label>
      <div class="col-sm-6">
        <input type="number" name="price" value="" id="price" placeholder="" class="form-control" v-on:input="sallary = $event.target.value" required>
      </div>
    </div>
     <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="sale">Скидка</label>
      <div class="col-sm-6">
        <input type="number" name="sale" value="" id="sale" placeholder="" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="date_of_sell">Дата продажи</label>
      <div class="col-sm-6">
        <input type="date" name="date_of_sell" value="" id="date_of_sell" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="user_id">Мастер</label>
      <div class="col-sm-6">
        <select class="form-control custom-select " name="user_id" id="user_id">
          @foreach($users as $user)
            <option value="{{ $user->id }}"
              @if ($user->active)
                selected="true"
              @endif>
              {{ $user->name}}
            </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm" for="salary">% мастеру</label>
      <div class="col-sm-6">
        <input type="text" name="salary" v-bind:value="sallary * 0.2" id="salary" readonly placeholder="Рассчитается автоматически" class="form-control">
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
  </div>
</form>