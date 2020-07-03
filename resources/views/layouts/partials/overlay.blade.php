<portal-target name="overlay">

    @yield('overlay')

</portal-target>

<ui-overlay>

    <template slot="loading">

        <ui-loading color="{{ accent() }}"></ui-loading>

    </template>

</ui-overlay>
