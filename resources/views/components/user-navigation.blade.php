@auth
    <a
        class="inline-block pr-1 text-{{ accent() }}-600 hover:text-{{ accent() }}-500 hover:underline"
        href="/backend"
        target="_blank"
    >
{{--        <ui-icon--}}
{{--            icon="lockOpen"--}}
{{--            class="mr-1"--}}
{{--            size="17"--}}
{{--            nudge="3"--}}
{{--        ></ui-icon>--}}
        Backend (<span class="font-medium">{{ request()->user()->name }}</span>)
    </a>
@else
    <a
        class="inline-block px-1 text-{{ accent() }}-600 hover:text-{{ accent() }}-500 hover:underline"
        href="/backend"
        target="_blank"
    >
{{--        <ui-icon--}}
{{--            icon="lockOpen"--}}
{{--            class="mr-1"--}}
{{--            size="17"--}}
{{--            nudge="3"--}}
{{--        ></ui-icon>--}}
        Login
    </a>
@endif
