@extends('layouts.public')

@section('content')
    <h1>Hello world</h1>
    <button class="btn btn-primary flash-test">flash('test')</button>
    <a href="/example/modal" class="btn btn-primary ajax-modal">.ajax-modal</a>

@endsection

@push('scripts')
    <script>
        $('.flash-test').on('click',function(){
            flash('test');
        });
    </script>
@endpush