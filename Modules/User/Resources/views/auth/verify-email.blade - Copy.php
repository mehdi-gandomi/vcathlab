@extends('layouts.app')

@section('content')
    <div>

    </div>





    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">
            {{ __('Logout') }}
        </button>
    </form>
@endsection
