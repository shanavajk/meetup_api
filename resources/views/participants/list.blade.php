@extends('layouts.app')

@section('includes')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection

@section("content")

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Registered Particpants</div>

                <div class="card-body">
                    @if(isset($message))
                        <div class="alert alert-success" role="alert">
                            {{$message}}
                        </div>
                    @endif
                     
                    <table cellspacing="0"  cellpadding="0" width="100%" class=" table table-bordered ">
                        <thead class="thead-light text-center">                    
                            <tr>
                                <th class="text-center">Sl</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>DOB</th>
                                <th>Profession</th>
                                <th>Locality</th>
                                <th>No of Guests</th>
                                <th>Address</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>                      
                            @php $sl =0 @endphp
                            @foreach($participants as $participant)
                                <tr>
                                    <td class="text-center">{{$sl+=1}}</td>
                                    <td>{{$participant->name}}</td>
                                    <td class="text-center">{{$participant->age}}</td>
                                    <td class="text-center">{{$participant->dob}}</td>
                                    <td class="text-center">{{$participant->profession}}</td>
                                    <td>{{$participant->locality}}</td>
                                    <td class="text-center">{{$participant->no_of_guests}}</td>
                                    <td>{{$participant->address}}</td>
                                    <td class="text-center">
                                        <a id="edit_category" href="/participants/{{$participant->participant_id}}" class="btn btn-sm btn-success" >Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<
<script type="text/javascript">
    $(document).ready(function(){
        $('.table').DataTable();
    });
</script>
@endsection