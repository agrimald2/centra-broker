<template>
    <div :id="id" tabindex="-1"
        class="no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative max-w-xl max-h-full m-auto" style="min-width: 50%;">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" @click="hideModal"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Añadir Archivo</h3>
                    <div class="space-y-1">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mb-4">
                            <div class="sm:col-span-6">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 dark:text-white">
                                    Tipo de Archivo
                                </label>
                                <div class="relative">
                                    <select v-model="this.asset_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="1">Hoja de Cáculo</option>
                                        <option value="2">Documento de Texto</option>
                                        <option value="3">PDF</option>
                                        <option value="4">Audios</option>
                                        <option value="5">Imágenes</option>
                                        <option value="6">Videos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 dark:text-white">
                                    Nombre del archivo
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <i class="fa-solid fa-tag"></i>
                                    </div>
                                    <input type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="ejemplo.pdf" v-model="file.name">
                                </div>
                                <span class="text-sm text-gray-500">
                                    {{ `${new Date().toLocaleDateString().replace(/\//g, '-')}-${new Date().toLocaleTimeString().replace(/:/g, '.')}-${file.name}` }}
                                </span>
                            </div>
                            <div class="sm:col-span-6">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Subir Archivo</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" type="file"
                                    @change="handleFileChange">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, MP4,
                                    MP3, PDF, EXCEL, DOCS, ETC.</p>
                            </div>
                        </div>
                        <button type="button" @click="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uppercase">Crear</button>
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
    props: ['id'],
    data() {
        return {
            file: {
                name: null,
                type_id: null,
            },
        };
    },
    methods: {
        async submit() {
            try {
                const file = { ...this.file };
                this.$emit('file-added', file);
                this.hideModal();
                // handle success (e.g., show notification, redirect)
            } catch (error) {
                console.log(error);
                // handle error (e.g., show error message)
            }
        },
        hideModal() {
            let element = document.getElementById(this.id);
            element.classList.add('slide-out-bck-center');
            setTimeout(() => {
                element.classList.add('no-display');
            }, 500);
        },
        handleFileChange(event) {
            this.file.name = event.target.files[0].name;
        },
    },
};
</script>