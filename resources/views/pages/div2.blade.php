@extends('pages.calculate')

@section('calc')
<div class="container">
    @if(isset($r))
        Quotient: {{ $q }}
        <br>
        Remainder: {{ $r }}
    @else
        Quotient: {{ $q }}
    @endif
</div> 
@endsection