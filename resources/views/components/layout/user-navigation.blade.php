@php($classList = 'flex hover:underline items-center text-'.$accent.'-600 hover:text-'.$accent.'-500')

<a {{ $attributes->merge(['class' => $classList]) }} href="/backend">
    @auth
        <x-icon class="-mt-0.5 h-4 w-4 mr-1" icon="user" />
        <span>Backend (<span class="font-medium">{{ request()->user()->name }}</span>)</span>
    @else
        <x-icon class="-mt-0.5 h-4 w-4 mr-1" icon="lock" />
        <span>Login</span>
    @endif
</a>
