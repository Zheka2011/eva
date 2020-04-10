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
          <td>{{ $selling->date_of_sell }}</td>
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

<form action="{{ route('selAdd') }}" method="post">
  @csrf
  <div class="form-group" id="perSallary">
    <label for="model">
      <input type="text" name="model" value="" id="model" placeholder="Введите модель" class="form-control">
    </label>
    <label for="contact">
      <input type="text" name="contact" value="" id="contact" placeholder="Введите номер телефона"  class="form-control">
    </label>
    <label for="price">
      <input type="number" name="price" value="" id="price" placeholder="Введите стоимость заказа" class="form-control" v-on:input="sallary = $event.target.value">
    </label>
    <label for="sale">
      <input type="number" name="sale" value="" id="sale" placeholder="Скидка" class="form-control">
    </label>
    <label for="date_of_sell">
      <input type="date" name="date_of_sell" value="" id="date_of_sell" class="form-control">
    </label>
    <label for="user_id">
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
    </label>
    <label for="salary">
      <input type="text" name="salary" v-bind:value="sallary * 0.2" id="salary" readonly placeholder="Рассчитается автоматически" class="form-control">
    </label>
    <label for="comment">
      <input type="textarea" name="comment" value="" id="comment" placeholder="Введите комментарий" class="form-control">
    </label>
    <button type="submit" class="btn btn-success" >Отправить</button>
  </div>
</form>