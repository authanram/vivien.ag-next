<style>
    .loading {
        animation: rotate infinite 2.5s linear;
        border-bottom: 5px solid transparent;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top-width: 5px;
        border-radius: 50%;
        height: 128px;
        width: 128px;
    }

    .loading-before {
        animation: rotate infinite 2s linear;
        border-bottom: 4px solid transparent;
        border-left: 4px solid transparent;
        border-radius: 50%;
        border-right: 4px solid transparent;
        border-top-width: 4px;
        position: absolute;
    }

    .loading-after {
        animation: rotate infinite 2s linear;
        border-bottom: 3px solid transparent;
        border-left: 3px solid transparent;
        border-radius: 50%;
        border-right: 3px solid transparent;
        border-top-width: 3px;
    }

    .loading-before {
        bottom: 10px;
        left: 10px;
        right: 10px;
        top: 10px;
    }

    .loading-after {
        animation-duration:1s;
        border-width: 3px;
        bottom: 24px;
        left: 24px;
        right: 24px;
        top: 24px;
    }

    @keyframes rotate {
        from { transform:rotate(0deg); }
        to { transform:rotate(360deg); }
    }

    @-moz-keyframes rotate {
        from { -moz-transform: rotate(0deg); }
        to { -moz-transform: rotate(360deg); }
    }

    @-webkit-keyframes rotate {
        from { -webkit-transform: rotate(0deg); }
        to { -webkit-transform: rotate(360deg); }
    }
</style>

<template>
    <div class="relative">
        <div :class="`absolute border-t-${color}-700 loading`">
            <div :class="`absolute border-t-${color}-500 loading-before`"></div>
            <div :class="`absolute border-t-${color}-400 loading-after`"></div>
        </div>
        <div class="pt-56 text-center">
            <div class="bg-opacity-75 bg-white font-semibold inline-block p-1 px-2 rounded text-sm tracking-wider">
                <div
                    :class="`font-normal text-${color}-600`"
                    v-html="text"
                ></div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    export default {
       props: {
           color: {
               default: 'teal',
               type: String,
           },
           duration: {
               default: 1,
               type: Number,
           },
           text: {
               default: 'Lädt . . .',
               type: String,
           },
       },
    }
</script>
