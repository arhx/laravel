<div id="flash-container"></div>

@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
        flash('{{ $error }}','danger', 10000);
        @endforeach
    </script>
@endif
@if(Session::has('flash_msg'))
    <script>flash('{{ session('flash_msg') }}','{{ session('flash_type') }}', 10000);</script>
@endif