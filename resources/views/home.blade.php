
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container col-md-8 col-md-offset-2" style="background-color: #F1F1F1">
        <h2>Hello <b>{{ Auth::user()->name }}</b> Check Your Messages</h2>
		<br>
		<a href='{{route('deleteAll')}}' class='btn btn-danger'> Delete All </a>
		<a href='{{route('getImport')}}' class='btn btn-success'> Import </a>
		<a href='getExport' class='btn btn-info'> Export </a>
        <table class="table table-striped " style="background-color='red'">
        <p> &nbsp </p>
            <tbody>
				<thead>
					<th>Sender</th>
					<th>Subject</th>
					<th>Message</th>
					<th>Delete</th>
					<th>Mark</th>
				</thead>
				@foreach($messages as $message)
					
					<tr>
						<td>{{$message->name}}</td>
						<td>{{$message->subject}}</td>
						<td>{{$message->details}}</td></td>
						<td>
						
							<form method="POST" action="{{route('messages.destroy', ['id'=>$message->id])}}">
								{{csrf_field()}}
								
								<button class="btn btn-danger btn-sm" type="submit"> Delete</button>
								<input type="hidden" name="_method" value="DELETE" />
							</form>
						</td>
						
						<td>
							<form method="POST" action="{{route('messages.update', ['id'=>$message->id])}}">
								{{csrf_field()}}
								<button class="btn btn-default btn-sm" type="submit" >{{$message->imp==0?'Mark Important':'Important'}}</button>
								<input type="hidden" name="_method" value="PUT" />
							</form>
													
							
						</td>
									
					</tr>            
                @endforeach
               
            </tbody>
        </table>
		@if(Session::has('msgDelete_sucsess'))
			<div class='alert alert-success'>{{Session::get('msgDelete_sucsess')}}</div>
		@endif
		@if(Session::has('import_success'))
			<div class='alert alert-success'>{{Session::get('import_success')}}</div>
		@endif
		
		@if(Session::has('deleteAll_success'))
			<div class='alert alert-success'>{{Session::get('deleteAll_success')}}</div>
		@endif
		@if(Session::has('mark'))
			<div class='alert alert-success'>{{Session::get('mark')}}</div>
		@endif
		
    </div>
	

</div>
<br>

@endsection
