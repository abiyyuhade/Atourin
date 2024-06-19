<!-- JAVASCRIPT -->
<script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/metismenujs/metismenujs.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/eva-icons/eva.min.js') }}"></script>
        <!-- alertifyjs js -->
<script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>

<script>
    @if (session('success'))
        alertify.success('{{ session('success') }}');
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            alertify.error('{{ $error }}');
        @endforeach
    @endif
</script>
@yield('scripts')