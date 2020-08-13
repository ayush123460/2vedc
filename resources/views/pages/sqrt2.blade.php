@extends('pages.calculate')

@section('calc')
<div class="container">
    @if($sqrt == -1)
    Square root does not exist.
    @else
    Result: {{ $sqrt }}
    @endif
</div> 
@endsection