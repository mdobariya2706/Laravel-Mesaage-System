@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="container col-md-6 col-md-offset-3" style="background-color: #F1F1F1">
			<h3><b>Update Profil</b></h3>

			<form method="post" action="{{route('user.update',['user'=>$user->id])}}">
			{{csrf_field()}}
			<div class="input-group">
				<span class="input-group-addon"> &nbsp&nbsp&nbsp<b>Neme </b>&nbsp&nbsp&nbsp</span>
				<input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"> &nbsp&nbsp&nbsp <b>Email </b>&nbsp&nbsp&nbsp</span>
				<input id="email" type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
			</div>
			<br>
			<input type="submit" value="Update" class="btn btn-primary col-md-offset-5" / >
			<input type="hidden" name="_method" value="PUT" />
		  </form>
		  <br>
		  @if(Session::has('profile_updated'))
    <div class='alert alert-success'>{{Session::get('profile_updated')}}</div>
    @endif
		</div>
	</div>
@endsection