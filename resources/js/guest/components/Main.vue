<template>
    <main>
        <router-view :key="$route.path"></router-view>
    </main>
</template>

<script>
export default {
    name: "Main"
}
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

    main {
        margin: 1.25rem 0;
        padding: 1.25rem;
        background-color: $background-secondary-light;
        border: 2px dotted $color-border;
        border-radius: 1.625rem;
    }
</style>