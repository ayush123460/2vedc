@extends('pages.calculate')

@section('calc')
<div class="container">
    <div class="alert alert-warning">Please enter divisors near to their bases.</div>
    <form action="/calculate/division" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="divisor">Divisor:</label>
                </div>
                <div class="col-md-6">
                    <label for="dividend">Dividend:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="divisor" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="text" name="dividend" class="form-control">
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