@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container col-md-8 col-md-offset-2" style="background-color: #F1F1F1">
        <h2>Hello <b>{{ Auth::user()->name }}</b> Check Your Messages</h2>

        <table class="table table-striped">
        <p>&nbsp</p>
            <tbody>
					<tr>
						<td>{{$message->name}}</td>
						<td>{{$message->subject}}</td>
						<td>{{$message->details}}</td>									
					</tr>            
                
            </tbody>
        </table>
		@if(Session::has('msgDelete_sucsess'))
			<div class='alert alert-success'>{{Session::get('msgDelete_sucsess')}}</div>
		@endif
		
    </div>
	

</div>
<br>

@endsection
