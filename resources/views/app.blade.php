@extends('master')

@section('navmenu')
    @include('components.navmenu-articles')
@endsection

@section('vue-script')
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="container" id="app">
        <router-view></router-view>
    </div>
</section>
@endsection
