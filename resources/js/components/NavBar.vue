<script setup>
import {useModulesState} from "../store/module.js";
import logo from '../../../public/logo.svg'

</script>

<template>
    <nav class="nav">
        <img
            :src="logo"
            alt="logo"
        />
        <button
            class="button"
            @click="useModulesState().postGenerateModule()"
        >
            GENERATE FILES
        </button>
    </nav>
</template>
