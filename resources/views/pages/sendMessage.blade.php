@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container col-md-6 col-md-offset-3" style="background-color: #F1F1F1">
        <h3><b>New Message</b></h3>
		
        <form method="post" action="{{route('user.store')}}">
		{{csrf_field()}}
        <div class="input-group">
            <span class="input-group-addon"> &nbsp&nbsp&nbsp&nbsp <b>To </b>&nbsp&nbsp&nbsp&nbsp</span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
        </div>


        <div class="input-group">
          <span class="input-group-addon"><b>Subject</b></span>
          <input id="subject" type="text" class="form-control" name="subject" placeholder="Subject">
        </div>

        <div class="input-group">
          <textarea rows="8" style="width:323%" name="details"></textarea>
        </div>
		
		<input type="submit" value="Send" class="btn btn-primary col-md-offset-5" / >
		
      </form>
      <br>
	  @if(Session::has('message_success'))
    <div class='alert alert-success'>{{Session::get('message_success')}}</div>
    @endif
    </div>
</div>
@endsection
