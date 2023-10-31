<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import GridExample from '@/Components/Flowbite/Layout/GridExample.vue';
import { Head } from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
</script>
<template>
    <Head title="Dashboard" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <p class="font-bold text-xl ">Dashboard de estadísticas</p>
        <div
            class="grid max-w-screen-xl grid-cols-1 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-2 xl:grid-cols-2 dark:text-white sm:p-8 text-center items-center py-4 bg-white">
            <div class="mt-4 mx-2 w-full sm:w-auto">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                    Inicio
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input type="date" style="background-color: white;" v-model="filter.start_date" @change="fetchStadistics()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div>
            </div>
            <div class="mt-4 mx-2 w-full sm:w-auto">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                    Fin
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input type="date" style="background-color: white;" v-model="filter.end_date" @change="fetchStadistics()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div>
            </div>
        </div>
        <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel"
            aria-labelledby="statistics-tab">
            <dl
                class="grid max-w-screen-xl grid-cols-1 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-2 xl:grid-cols-3 dark:text-white sm:p-8 text-center">
                <div class="flex flex-col">
                    <dt class="mb-2 text-3xl font-extrabold">{{stadistics.policies_total_number}} #</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Polizas</dd>
                </div>
                <div class="flex flex-col">
                    <dt class="mb-2 text-3xl font-extrabold">{{ stadistics.policies_total_comission }} $</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Comisión</dd>
                </div>
                <div class="flex flex-col">
                    <dt class="mb-2 text-3xl font-extrabold">{{stadistics.policies_total_net_premium}} $</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Prima Neta</dd>
                </div>
                <div class="flex flex-col">
                    <dt class="mb-2 text-3xl font-extrabold">{{ stadistics.incidents_total }} #</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Siniestros</dd>
                </div>
                <div class="flex flex-col">
                    <dt class="mb-2 text-3xl font-extrabold">{{ stadistics.assets_total }} #</dt>
                    <dd class="text-gray-500 dark:text-gray-400">Activos</dd>
                </div>
            </dl>
        </div>
    </AdminLayout>
</template>
<script>
import axios from 'axios';
export default {
    components: {
    },
    props: ['breadcrumbs'],
    data() {
        return {
            filter: {
                start_date: new Date().toISOString().substr(0, 10),
                end_date: new Date(new Date().setDate(new Date().getDate() + 1)).toISOString().substr(0, 10),
            },
            stadistics: "[]",
        };
    },
    methods: {
        async fetchStadistics() {
            console.log("a");
            const response = await axios.get('/api/stadistics', {
                params: this.filter
            });
            this.stadistics = response.data;
        }

    },
    mounted() {
        this.fetchStadistics();
    },
    watch: {
        'filter.start_date': function(newVal, oldVal) {
            this.fetchStadistics();
        },
        'filter.end_date': function(newVal, oldVal) {
            this.fetchStadistics();
        }
    }
};
</script>