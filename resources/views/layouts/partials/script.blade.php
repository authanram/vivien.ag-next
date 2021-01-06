<script>
    window.ACCENT = '{{ accent() }}';
    window.INITIAL = {!! trim($__env->yieldContent('initial')) ?: '{}' !!};
    window.INITIAL_STATE = {!! \json_encode(app()->make(\App\Services\StateService::class)->getState(), JSON_THROW_ON_ERROR) !!};
</script>
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
