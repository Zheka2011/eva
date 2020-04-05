<h1 class="mt-5">Пользователи</h1>
<div class="table-responsive ">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Login</th>
        <th>email</th>
        <th>Роль</th>
        <th>Права</th>
      </tr>
    </thead>
    <tbody>
      {{-- {{ dd ($users) }} --}}
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role}}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>