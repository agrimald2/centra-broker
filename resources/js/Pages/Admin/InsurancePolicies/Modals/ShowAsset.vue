<template>
    <div :id="id" tabindex="-1"
        class="no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative max-w-xl max-h-full m-auto" style="min-width: 30%;">
            <div class="relative bg-white rounded-lg shadow ">
                <button type="button" @click="hideModal"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center  ">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 ">Ver Activo
                        <a v-if="asset.incidents.length > 0" :href="'/admin/incidents/show/' + asset.incidents[0].id"
                            class="text-white bg-red-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-1 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                            <i class="fa-solid fa-car-burst text-xl"></i>
                        </a>
                    </h3>
                    <div class="space-y-3">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Tipo de activo
                                </label>
                                <div class="relative">
                                    <select v-model="this.asset_type" disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option v-for="assets_type in assets_types" :value="assets_type"
                                            class="text-gray-900">
                                            {{ assets_type.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Valor Asegurado (USD)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <i class="fa-solid fa-sack-dollar"></i>
                                    </div>
                                    <input type="number" v-model="insured_amount" disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="23,000">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Fin de Vigencia
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <i class="fa-solid fa-calendar"></i>
                                    </div>
                                    <input type="date" v-model="vigency_date" disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full">
                            <hr class="w-64 h-px my-2 bg-gray-200 border-0 ">
                            <span
                                class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2  ">Información</span>
                        </div>

                        <div class="space-y-1" v-if="asset_type">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                                <div v-for="(attribute, index) in this.asset_type.attributes" class="sm:col-span-3">
                                    <label for="name" class="block mb-2 text-sm font-bold text-indigo-900 ">
                                        {{ attribute.name }}
                                    </label>
                                    <div class="relative" v-if="assets_attributes_array[index]">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </div>
                                        <input :type="attribute.input_type" name="name" id="name"
                                            :value="assets_attributes_array[index].value"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            :placeholder="attribute.example" disabled>
                                    </div>
                                    <span class="text-sm text-gray-500">
                                        {{ attribute.description }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-center">
                            <h3 class="mb-4 text-md font-md text-gray-900 ">Selecciona un Tipo de Activo</h3>
                        </div>
                        <button type="button" @click="addIncident()" v-if="asset.incidents.length == 0"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase">Añadir
                            Siniestro</button>
                        <button type="button" @click="addIncident()" v-else
                            class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase">Ver
                            Siniestro</button>
                        <button type="button" @click="hideModal"
                            class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    components: {},
    props: ['id', 'asset', 'assets_attributes_data'],
    data() {
        return {
            assets_types: [],
            asset_type: this.asset.asset_type,
            insured_amount: this.asset.insured_amount,
            vigency_date: this.asset.vigency_date,
            assets_attributes_array: Object.values(this.assets_attributes_data), // Converted object to array
        };
    },
    methods: {
        hideModal() {
            let element = document.getElementById(this.id);
            element.classList.add('slide-out-bck-center');
            setTimeout(() => {
                element.classList.add('no-display');
            }, 500);
        },
        async getAssetsTypes() {
            try {
                const response = await axios.get('/api/assets_types');
                this.assets_types = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        addIncident() {
            window.location.href = `/admin/incidents/create/${this.asset.id}`;
        }
    },
    mounted() {
        this.getAssetsTypes();
    },
};
</script>