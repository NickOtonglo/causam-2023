@extends('master')

{{-- @section('navmenu')
    @include('components.navmenu-articles')
@endsection --}}

@section('vue-script')
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
@endsection

@section('content')
<router-view></router-view>
@endsection
