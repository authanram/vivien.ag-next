<script>
    window.ACCENT = '{{ accent() }}';
    window.INITIAL = {!! trim($__env->yieldContent('initial')) ?: '{}' !!};
    window.INITIAL_STATE = {!! \json_encode(app()->make(\App\Services\StateService::class)->getState(), JSON_THROW_ON_ERROR) !!};
</script>
<script src="{{ mix('/dist/js/app.js') }}"></script>
