<script setup>
    import {useModulesState} from "../store/module.js";

    const modulesStore = useModulesState();

</script>
<template>
    <div class="form-group form-group--full-width">
        <label for="clickout">Clickout</label>
        <div>
            <input
                id="clickout"
                v-model="modulesStore.selectedModule.script.clickout"
                type="text"
                name="clickout"
                placeholder="https://appverk.com"
                value="https://appverk.com"
            />
        </div>
    </div>

    <div class="form-group form-group--half-width">
        <label for="clickout">Width (%)</label>
        <div>
            <input
                id="width"
                v-model="modulesStore.selectedModule.styles.width"
                type="number"
                name="width"
                placeholder="100"
                value="100"
                min="0"
                max="100"
            />
        </div>
    </div>

    <div class="form-group form-group--half-width">
        <label for="clickout">Height (%)</label>
        <div>
            <input
                id="height"
                v-model="modulesStore.selectedModule.styles.height"
                type="number"
                name="height"
                placeholder="100"
                min="0"
                max="100"
                value="100"
            />
        </div>
    </div>

    <div class="form-group form-group--half-width">
        <label for="clickout">Position X (%)</label>
        <div>
            <input
                id="positionX"
                v-model="modulesStore.selectedModule.styles.positionX"
                type="number"
                name="positionX"
                placeholder="0"
                value="0"
                min="0"
                max="100"
            />
        </div>
    </div>

    <div class="form-group form-group--half-width">
        <label for="clickout">Position Y (%)</label>
        <div>
            <input
                id="positionY"
                v-model="modulesStore.selectedModule.styles.positionY"
                type="number"
                name="positionY"
                placeholder="0"
                value="0"
                min="0"
                max="100"
            />
        </div>
    </div>

</template>
