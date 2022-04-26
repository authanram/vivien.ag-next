<div class="-mb-px cookie-consent js-cookie-consent">
    <div class="relative bg-{{ util()->accent() }}-500 text-white z-10">
        <div class="lg:max-w-5xl md:pl-5 mx-auto px-5 py-3 xl:max-w-screen-xl xl:px-10">
            <div class="flex flex-col md:items-center md:flex-row leading-tight">
                <div class="md:mr-5">
                    <span class="cookie-consent__message font-medium md:block text-sm md:text-base">
                        {{ trans('cookie-consent::texts.message') }}
                    </span>
                    <span class="text-xs">
                        {{ trans('cookie-consent::texts.info') }}
                        <a href="{{ util()->route('cookie-policy') }}" class="font-medium hover:underline">{{ lcfirst(trans('cookie-consent::texts.click_here')) }}</a>.
                    </span>
                </div>
                <button
                    class="js-cookie-consent-button bg-white focus:bg-opacity-100 font-light h-8 hover:bg-{{ util()->accent() }}-600 hover:text-white px-2 md:mt-0 md:mr-1 mt-2 rounded text-{{ util()->accent() }}-600 text-sm whitespace-no-wrap"
                    data-callback-params="{all:true}"
                >{{ trans('cookie-consent::texts.agree') }}</button>
                <a
                    class="font-light h-8 hover:underline px-2 md:h-auto md:mt-0 md:mr-1 mt-2 rounded text-xs whitespace-no-wrap"
                    href="{{ util()->route('cookie-policy') }}"
                >{{ trans('cookie-consent::texts.settings') }}</a>
            </div>
        </div>
    </div>
</div>
