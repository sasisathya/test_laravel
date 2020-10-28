@extends('layouts.main')

@section('content')
<div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Display Table Data </h1>
 <br>
 <a href="{{route('user-registeration.create')}}" class="btn btn-info">Add New</a>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 <thead>
 <tr class="bg-dark text-white text-center">
 
 <th> Company name </th>
 <th> E-Mail </th>
 <th> Mobile No </th>
 <th> HR Name </th>
 <th>Address</th>

 </tr >
 </thead>
 <tbody>
 @foreach($data as $res)
 <tr class="text-center">
 
 <td>{{$res->company_name}} </td>
 <td> {{$res->email}} </td>
 <td>{{$res->mobile}} </td>
 <td> {{$res->hr_name}} </td>
 <td>{{$res->address}} </td>

 </tr>

@endforeach
</tbody>
 
 </table>  

 </div>
 </div>
@endsection
@section('script')
@parent

 <script type="text/javascript">
 
 $(document).ready(function(){
 	$('#tabledata').DataTable();
 }) 
 
 </script>
@stop