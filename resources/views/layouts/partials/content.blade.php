@php($hasSidebar = (bool)trim($__env->yieldContent('sidebar')))

<div class="lg:flex">

    <div {{ classAttribute('lg:flex lg:self-stretch')->when($hasSidebar, 'lg:w-1/2', 'w-full') }}>

        @yield('content')

    </div>

    @if ($hasSidebar)

        <div class="lg:flex lg:self-stretch lg:pl-10 lg:w-1/2">

            @yield('sidebar')

        </div>

    @endif

</div>
