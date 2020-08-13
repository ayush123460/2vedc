@extends('pages.calculate')

@section('calc')
<div class="container">
    <form action="/calculate/cube" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="num1">Number:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="num1" class="form-control">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <input type="submit" value="Calculate" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection