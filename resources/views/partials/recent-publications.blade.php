<div class="mx-auto relative">

    <div>

        <p class="font-semibold leading-tight text-3xl text-{{ accent() }}-600 tracking-tight">

            Kürzlich veröffentlicht

        </p>

        <p class="leading-7 mt-3 sm:mt-4 text-gray-500 text-xl">

            Das könnte dich interessieren

        </p>

        <div class="italic mt-1 text-gray-500 text-xs">
            (Zuletzt veröffentlichte Seminare und Blogbeiträge)
        </div>

    </div>

    <div class="border-gray-200 border-t-2 mt-10 pt-10">

        <ui-activities
            :style="$breakpoint.ge('lg') ? 'min-height:338px' : false"
            accent="{{ accent() }}"
        ></ui-activities>

    </div>

</div>
