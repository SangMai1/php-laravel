<!-- Extends template page -->
@extends('layout.app')

<!-- Specify content -->
@section('content')

<h3>Add Phong ban</h3>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <!-- Alert message (start) -->
    @if(Session::has('message'))
    <div class="alert {{ Session::get('alert-class') }}">
      {{ Session::get('message') }}
    </div>
    @endif
    <!-- Alert message (end) -->

    <div class="actionbutton">

      <a class='btn btn-info float-right' href="{{route('phongban')}}">List</a>

    </div>

    <form action="{{route('phongban.store')}}" method="post">
      {{csrf_field()}}

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Id <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="name" class="form-control col-md-12 col-xs-12" name="id" placeholder="Enter subject id" required="required" type="text">

          @if ($errors->has('id'))
          <span class="errormsg">{{ $errors->first('id') }}</span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input name='name' id='description' class='form-control' placeholder="Enter name"></input>

          @if ($errors->has('name'))
          <span class="errormsg">{{ $errors->first('name') }}</span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6">

          <input type="submit" name="submit" value='Submit' class='btn btn-success'>
        </div>
      </div>

    </form>

  </div>
</div>
@stop