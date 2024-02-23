@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 200000);
    </script>
@endif
@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible">
        {{ session('warning') }}
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 200000);
    </script>
@endif
@if (session()->has('not-allowed'))
    <div class="alert alert-danger alert-dismissible">
        {{ session('not-allowed') }}
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 200000);
    </script>
@endif
@if (session()->has('not-deleteable'))
    <div class="alert alert-warning alert-dismissible">
        {{ session('not-deleteable') }}
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 200000);
    </script>
@endif

@if (session()->has('validation-errors'))
        @foreach (session('validation-errors') as $error)
            <div class="alert alert-danger fade show in m-b-15">
                <strong>Ошибка!</strong>
                {{$error}}
                <span class="close" data-dismiss="alert">&times;</span>
            </div>
        @endforeach
    <script>
        setTimeout(function () {
            $('.alert').hide();
        }, 200000);
    </script>
@endif

