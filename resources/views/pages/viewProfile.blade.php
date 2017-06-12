@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container col-md-10 col-md-offset-2" style="background-color: #F1F1F1">
      <h2>This is Your Profile : &nbsp<b>{{ $user->name }}</b> </h2>

        <table class="table table-striped">
        <p>&nbsp</p>
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      
    </tbody>
  </table>
</div>
