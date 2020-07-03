<div class="absolute mt-16 ml-5 top-0 z-30">

    <ui-coords
        :auth="{{ (bool)optional(request()->user())->id ? 'true' : 'false' }}"
        class="w-full"
    ></ui-coords>

</div>
