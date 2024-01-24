import {defineStore} from "pinia";

export const useModulesState = defineStore('modules', {
    state: () => ({
        availableModules: [],
        selectedModules: [],
    }),
    getters: {
        getAvailableModules: (state) => state.availableModules,
        getSelectedModules: (state) => state.selectedModules,
        getRandUuid: () => (Math.random() + 1).toString(36).substring(2)
    },
    actions: {
        initModules() {
            this.availableModules = [
                {
                    uuid: this.getRandUuid,
                    type: 'background',
                    name: 'Background',
                    clickout: 'https://appverk.com',
                    width: 100,
                    height: 100,
                    positionX: 0,
                    positionY: 0,
                },
                {
                    uuid: this.getRandUuid,
                    type: 'typo',
                    name: 'Typo',
                    clickout: 'https://mits.pl',
                    width: 50,
                    height: 50,
                    positionX: 10,
                    positionY: 10,
                }
            ];
        },
        addSelectedModule(module){
            this.selectedModules = [];
            this.selectedModules.push(module);
        },
        removeSelectedModule(module){
            this.selectedModules = this.selectedModules.filter(el => el.uuid !== module.uuid);
        }
    },
})
