@php($classList = 'flex items-center text-'.accent().'-600 hover:text-'.accent().'-500 hover:underline')

@auth
    <a class="{{ $classList }}" href="/backend" target="_blank">
        <x-icon-renderer class="h-4 w-4 mr-1" icon="user" />
        <span>Backend (<span class="font-medium">{{ request()->user()->name }}</span>)</span>
    </a>
@else
    <a class="{{ $classList }}" href="/backend" target="_blank">
        <x-icon-renderer class="h-4 w-4" icon="lock" />
        <span>Login</span>
    </a>
@endif
