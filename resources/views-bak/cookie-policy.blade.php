@extends('layouts.default')


@section('caption')
    <span class="font-medium">Die Einhaltung einer jeden Privatsphäre ist mir sehr wichtig.</span>
    Ebenso wichtig ist es mir, dass du wenigstens einigermaßen zum Thema "Cookies" aufgeklärt wurdest, wenn du meine Webseite besuchst.
@endsection

@section('content')

    <div class="w-full lg:w-1/2 lg:mr-5">

        <x-card>

            <h3 class="font-medium leading-tight pb-5 text-xl text-{{ accent() }}-600 tracking-tight">
                Worum geht es bei dem Begriff "Cookies"?
            </h3>

            <p class="mb-5">
                Bald auf jeder Webseite liest man den Begriff "Cookies" oder "Cookie-Einstellungen" und man soll diese Cookies dann auch noch akzeptieren, obwohl man häufig nur
                weiß; "<span class="font-medium">diese Cookies kann man nicht essen</span>".
            </p>

            <p class="mb-6">
                Vielleicht kann ich ein wenig Licht ins Dunkel bringen, in dem ich es dir in meinen Worten erkläre, was Cookies sind, welchen Zweck diese erfüllen und welche
                Cookies ich auf meiner Webseite verwende.
            </p>

            {{-- what? --}}

            <h4 class="font-medium leading-tight pb-5 text-xl text-{{ accent() }}-600 tracking-tight">
                Was sind denn diese Cookies überhaupt?
            </h4>

            <p class="mb-5">
                Cookies sind kleine Textdateien mit technischen Informationen, die auf deinem Gerät (Rechner, Smartphone oder Tablet) gespeichert werden, wenn du eine Website
                besuchst.
            </p>

            <p class="mb-5">
                Dank dieser Cookies musst du dich z.B. nicht bei jedem Seitenbesuch erneut einloggen oder jedesmal den selben Banner wegklicken, bevor du ungehindert surfen kannst.
            </p>

            {{-- for? --}}

            <h5 class="font-medium leading-tight pb-5 text-xl text-{{ accent() }}-600 tracking-tight">
                Welchen Zweck erfüllen Cookies?
            </h5>

            <p class="mb-5">
                Um deine Surf-Erfahrung verbessern zu können (z.B. auf deine Interessen zugeschnittene Inhalte), muss dein Gerät identifizierbar sein, was u.a. durch
                Cookies möglich ist.
            </p>

            <p class="mb-5">
                Stell dir vor du betrittst die Bäckerei deines Herzens und verdeckst dabei dein Gesicht mit einer Zeitung. Somit kann der von dir täglich gekaufte Kaffee im Becher,
                nicht wie üblich aus der Maschine gelassen werden, während dem noch Kunden vor dir abgwickelt werden. Das würde deine Bäckerei-Erfahrung mindern.
            </p>

            <p class="mb-5">
                Um deine Surf-Erfahrung bestmöglich auf dich bzw. deine Interessen abstimmen zu können, speichern Webseiten-Betreiber auf deinem Gerät Cookies.
            </p>

            <p class="mb-5">
                Häufig werden die gespeicherten Cookies zwischen denen von dir Besuchten Webseiten ausgetauscht, damit dir z.B. nicht auf jeder Webseite der gleiche Werbebanner
                angezeigt wird. Dieses Vorgehensweise wird weitläufig als "Tracking" bezeichnet.
            </p>

            {{-- why? --}}

            <h5 class="font-medium leading-tight pb-5 text-xl text-{{ accent() }}-600 tracking-tight">
                Weshalb verwende ich Cookies auf vivien.ag?
            </h5>

            <p>
                Die von vivien.ag gespeicherten Cookies dienen ausschießlich der Verbesserung deiner Surf-Erfahrung sowie zur statistischen Erfassung, welche Bereiche meiner Seite
                häufig bzw. nicht so häufig aufgerufen werden.
            </p>

        </x-card>

    </div>

    <div class="w-full lg:w-1/2 lg:ml-5">

        <x-card class="reject:border padding">

            <div class="p-8 pb-5">

                <h6 class="font-medium leading-tight pb-5 text-xl text-{{ accent() }}-600 tracking-tight">
                    Cookie-Einstellungen
                </h6>

                <p class="mb-5">
                    Hier kannst du deine Cookie-Einstellungen ändern und reglementieren welche Cookies auf deinem Gerät gespeichert werden dürfen.
                </p>

                <p class="text-gray-600 text-xs">
                    Cookies die für den fehlerfreien Betrieb meiner Webseite erforderlich sind können hier eingesehen, jedoch nicht geändert werden.
                </p>

            </div>

            <ui-cookie-consent
                :cookie-lifetime="{{ config('cookie-consent.cookie_lifetime') }}"
                :cookie-secure="{{ config('session.secure') ? 'true' : 'false' }}"
                :same-site="{{ config('session.same_site') ? 'true' : 'false' }}"
                cookie-domain="{{ config('session.domain') ?? request()->getHost() }}"
                cookie-name="{{ config('cookie-consent.cookie_name') }}"
                update-route="{{ routeIfExists('cookie-consent.update-preferences') }}"
            ></ui-cookie-consent>

        </x-card>

    </div>

@endsection
