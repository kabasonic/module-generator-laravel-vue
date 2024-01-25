<script setup>
import {useModulesState} from "../store/module.js";
import {onMounted} from "vue";
import ModuleForm from "./ModuleForm.vue";

const modulesStore = useModulesState();

onMounted(() => {
    modulesStore.initModules();
})
</script>

<template>

    <section class="pane available-modules-pane">
        <h3>AVAILABLE MODULES</h3>
        <button
            v-for="(el, i) in modulesStore.getAvailableModules"
            :key="`available-module-${i}`"
            class="available-modules-pane__button button"
            @click="modulesStore.setSelectedModule(el)"
        >
            {{ el.name }}
        </button>
    </section>

    <section class="pane selected-module-pane">
        <h3>SELECTED MODULE</h3>
        <div
            v-if="modulesStore.getSelectedModule"
            class="selected-module-pane__module button"
            @click="modulesStore.removeSelectedModule()"
        >
            <span>
                {{ modulesStore.getSelectedModule.name }}
            </span>
        </div>
    </section>

    <section class="pane module-settings-pane">
        <h3>MODULE SETTINGS</h3>
        <module-form
            v-if="modulesStore.getSelectedModule"
        />
    </section>

</template>
