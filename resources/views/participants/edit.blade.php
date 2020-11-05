@extends('layouts.app')

@section('includes')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section("content")

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Particpant</div>

                <div class="card-body">
                    @if ($errors->any())                        
                        @foreach ($errors->all() as $error)                            
                            <div class="alert alert-danger"> {{ $error }} </div>
                        @endforeach
                    @endif

                    @if(isset($message))
                        <div class="alert alert-success" role="alert">
                            {{$message}}
                        </div>
                    @endif

                    {!! Form::open(['action' => 'AdminController@update', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                {{Form::hidden('participant_id', $participant->participant_id)}}
                                {{Form::text('name', $participant->name, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required'])}}
                            </div>
                            <div class="col-md-6">
                                <label>DOB</label>
                                <!--input type="date" name="dob" class="form-control" id="dob"  placeholder="Date Of Birth" /-->
                                {{Form::text('dob', $participant->dob, ['class' => 'form-control', 'placeholder' => 'Date Of Birth', 'required' => 'required', 'id' => 'dob', 'autocomplete' => "off"])}}
                            </div>                        
                        </div><br/>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Age</label>
                                {{Form::text('age', $participant->age, ['class' => 'form-control', 'placeholder' => 'Age', 'required' => 'required', "id" => "age"])}}
                            </div>
                            <div class="col-md-6">
                                <label>Profession</label>
                                {{ Form::select('profession', array("Employed" => "Employed", "Student"=>"Student"), $participant->profession, array('class' => 'form-control', 'placeholder' => 'Select', 'required' => 'required')) }}
                            </div>                        
                        </div><br/>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Locality</label>
                                {{Form::text('locality', $participant->locality, ['class' => 'form-control', 'placeholder' => 'Locality', 'required' => 'required'])}}
                            </div>
                            <div class="col-md-6">
                                <label>Number of Guests</label>
                                {{Form::text('no_of_guests', $participant->no_of_guests, ['class' => 'form-control', 'placeholder' => 'Number of Guests<', 'required' => 'required'])}}
                            </div>                        
                        </div><br/>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Address</label>
                                {{Form::textarea('address', $participant->address, ['class' => 'form-control', 'placeholder' => 'Address', 'required' => 'required', 'rows' => 3])}}
                            </div>                        
                        </div><br/>
                        <div class="row justify-content-center">                        
                            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}                        
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<
<script type="text/javascript">
    $(document).ready(function(){
        $("#dob" ).datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "-40:+40",
            onSelect: function(d,i) {
                var today = new Date();
                var birthDate = new Date(d);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                $("#age").val(age);
            }
        });
    });
</script>
@endsection