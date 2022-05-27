@if(session()->has('success'))
    <x-alert type="success" :message="session()->get('success')"/>
@endif

@if(session()->has('error'))
    <x-alert type="danger" :message="session()->get('error')"/>
@endif
