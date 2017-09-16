@extends('index')

@section('title', 'Contact')

@section('content')
    <h1>Contact Me</h1>

    <form class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" placeholder="Enter name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10"> 
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="text">Message:</label>
        <div class="col-sm-10"> 
          <textarea class="form-control" id="text" placeholder="Write your message here!">
          </textarea>
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
@endsection