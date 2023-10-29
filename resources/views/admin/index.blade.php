@extends("admin.master")

@section("app")
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield("title")</h6>
    </div>
    <div class="card-body">
        @yield("main")
    </div>
</div>
@yield("audit")
@endsection
