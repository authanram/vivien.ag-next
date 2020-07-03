<script>
    window.ACCENT = '{{ accent() }}';
    window.INITIAL = {!! trim($__env->yieldContent('initial')) ?: '{}' !!};
    window.INITIAL_STATE = {!! \json_encode(app()->make(\App\Services\StateService::class)->getState(), JSON_THROW_ON_ERROR) !!};
</script>
<script src="{{ asset('/js/manifest.js') }}" defer></script>
<script src="{{ asset('/js/vendor.js') }}" defer></script>
<script src="{{ asset('/js/app.js') }}" defer></script>
