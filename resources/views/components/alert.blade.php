
@if (session()->has("success"))
<div class="alert alert-success">
    {{ session('success') }}
</div>
    
@endif

@if (session()->has("deleted"))
<div class="alert alert-success">
    {{ session('deleted') }}
</div>
    
@endif

@if (session()->has("updated"))
<div class="alert alert-success">
    {{ session('updated') }}
</div>
    
@endif