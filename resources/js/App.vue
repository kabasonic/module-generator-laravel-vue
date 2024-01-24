<script setup lang="ts">
import {onMounted} from "vue";
import {useModulesState} from './store.js';

const modulesStore = useModulesState();

onMounted(() => {
    modulesStore.initModules();
})

const generateFiles = () => {
    console.log('clicked')
    const data = fetch('http://127.0.0.1:8000/api/generate-files', {
        method: "POST",
        body: JSON.stringify(modulesStore.selectedModules[0]),
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        }
    })
        .then((response) => {
            // Sprawdź, czy odpowiedź jest prawidłowa
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            // Zwróć odpowiedź w formie blob
            return response.blob();
        })
        .then((blob) => {
            // Stwórz link do pobrania pliku
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'example.zip';

            // Dodaj link do DOM i symuluj kliknięcie
            document.body.appendChild(a);
            a.click();

            // Usuń link i zwolnij zasoby
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        })
        .catch((error) => {
            console.error('Błąd pobierania pliku ZIP:', error);
        });


}

</script>

<template>

    <section class="pane available-modules-pane">
        <h3>AVAILABLE MODULES</h3>
        <button
            v-for="(el, i) in modulesStore.getAvailableModules"
            :key="`available-module-${i}`"
            class="available-modules-pane__button button"
            @click="modulesStore.addSelectedModule(el)"
        >
            {{ el.name }}
        </button>
    </section>
    <section class="pane selected-module-pane">
        <h3>SELECTED MODULE</h3>
        <div
            class="selected-module-pane__module"
            v-for="(el, j) in modulesStore.getSelectedModules"
            :key="`selected-module-${j}`"
            @click="modulesStore.removeSelectedModule(el)"
        >
            <span>
                {{ el.name }}
            </span>
        </div>
    </section>

    <section v-if="modulesStore.getSelectedModules.length > 0" class="pane module-settings-pane">
        <h3>MODULE SETTINGS</h3>
        <div class="form-group">
            <label for="clickout">Clickout</label>
            <div>
                <input
                    id="clickout"
                    v-model="modulesStore.selectedModules[0].clickout"
                    type="text"
                    name="clickout"
                    placeholder="https://appverk.com"
                    value="https://appverk.com"
                />
            </div>
        </div>

        <div class="form-group">
            <label for="clickout">Width (%)</label>
            <div>
                <input
                    id="width"
                    v-model="modulesStore.selectedModules[0].width"
                    type="number"
                    name="width"
                    placeholder="100"
                    value="100"
                />
            </div>
        </div>

        <div class="form-group">
            <label for="clickout">Height (%)</label>
            <div>
                <input
                    id="height"
                    v-model="modulesStore.selectedModules[0].height"
                    type="number"
                    name="height"
                    placeholder="100"
                    value="100"
                />
            </div>
        </div>

        <div class="form-group">
            <label for="clickout">Position X (%)</label>
            <div>
                <input
                    id="positionX"
                    v-model="modulesStore.selectedModules[0].positionX"
                    type="number"
                    name="positionX"
                    placeholder="0"
                    value="0"
                />
            </div>
        </div>

        <div class="form-group">
            <label for="clickout">Position Y (%)</label>
            <div>
                <input
                    id="positionY"
                    v-model="modulesStore.selectedModules[0].positionY"
                    type="number"
                    name="positionY"
                    placeholder="0"
                    value="0"
                />
            </div>
        </div>

        <div class="form-group">
            <button
                class="button"
                @click="generateFiles()"
            >
                GENERATE FILES
            </button>
        </div>

    </section>

</template>
