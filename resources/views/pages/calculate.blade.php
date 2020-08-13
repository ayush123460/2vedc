@extends('main')

@section('content')

<div class="container-fluid">
    <div class="grid-container">
        <div class="menu">
            <p><a href="/calculate/multiplication">MULTIPLICATION</a></p>
            <p><a href="/calculate/division">DIVISION</a></p>
            <p><a href="/calculate/square">SQUARE</a></p>
            <p><a href="/calculate/sqrt">SQUARE ROOT</a></p>
            <p><a href="/calculate/cube">CUBE</a></p>
            <p><a href="/calculate/cbrt">CUBE ROOT</a></p>
        </div>
        <div class="page">
            <div class="alert alert-warning al1">For best results, use a desktop.</div>
            @hassection('calc')
                @yield('calc')
            @else
                <p>Click on a section to start.</p>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">{!! $errors->first() !!}</div>
            @endif
        </div>
    </div>
</div>

@endsection