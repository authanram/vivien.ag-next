<template>
    <portal to="overlay">
        <div class="bg-white border border-gray-100 p-4 rounded shadow-lg">
            remove
        </div>
    </portal>
</template>

<script lang="ts">
    export default {
        props: {
            dataId: {required: true, type: Number},
        },

        created (): void {

        },
    }
</script>
