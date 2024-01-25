import {defineStore} from "pinia";

export const useModulesState = defineStore('modules', {
    state: () => ({
        availableModules: [],
        selectedModule: null,
    }),
    getters: {
        getAvailableModules: (state) => state.availableModules,
        getSelectedModule: (state) => state.selectedModule,
    },
    actions: {
        initModules() {
            this.availableModules = [
                {
                    type: 'background',
                    name: 'Background',
                    script: {
                        clickout: 'https://appverk.com',
                    },
                    styles: {
                        width: 100,
                        height: 100,
                        positionX: 0,
                        positionY: 0,
                    },
                },
                {
                    type: 'typo',
                    name: 'Typo',
                    script: {
                        clickout: 'https://appverk.com',
                    },
                    styles: {
                        width: 100,
                        height: 100,
                        positionX: 0,
                        positionY: 0,
                    },
                },
            ];
        },
        setSelectedModule(module) {
            this.selectedModule = module;
        },
        removeSelectedModule() {
            this.selectedModule = null;
        },
        postGenerateModule() {
            if(!this.selectedModule){
                return;
            }
            const data = fetch(import.meta.env.VITE_API_HOST + '/api/generate-files', {
                method: "POST",
                body: JSON.stringify({...this.selectedModule}),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                }
            })
                .then((response) => {
                    if (!response.ok || response.redirected) {
                        throw new Error('Network response was not ok');
                    }

                    return response.blob();
                })
                .then((blob) => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'module.zip';

                    document.body.appendChild(a);
                    a.click();

                    document.body.removeChild(a);
                    window.URL.revokeObjectURL(url);
                })
                .catch((error) => {
                    console.error('ZIP file download error:', error);
                });
        }
    },
})
