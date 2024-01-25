<script setup>
import NavBar from "./NavBar.vue";
</script>

<template>
    <nav-bar/>
    <main
        id="app"
        class="main"
    >
        <slot></slot>
    </main>
</template>
