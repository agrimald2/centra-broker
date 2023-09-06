<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Clientes" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <div class="shadow-md sm:rounded-lg relative">
            <div class="px-2 flex items-center justify-between py-4 bg-white dark:bg-gray-800">
                <!-- Search by Name and Document Number-->
                <div class="flex items-center">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search" v-model="search" @input="fetchInsurancePolicies"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nombre | N° Doc" required>
                    </div>
                </div>
                <a href="/admin/insurance_policies/create"
                    class="text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                    <span class="hidden md:flex"> Nueva Póliza </span>
                    <i class="fa-solid fa-car-burst text-xl"></i>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table" v-if="insurancePolicies">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N° Poliza
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cliente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Companía
                            </th>
                            <th scope="col" class="px-6 py-3">
                                N° Activos
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Prima Neta
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Comisión Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Vigencia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="insurancePolicy in insurancePolicies"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="">
                                    <div class="text-base font-semibold">{{ insurancePolicy.number }}</div>
                                    <div class="font-normal text-gray-500  hidden sm:flex">{{ new
                                        Date(insurancePolicy.created_at).toLocaleDateString() }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ insurancePolicy.latest_insurance_policy_data.customer.name }}
                                <br>
                                {{ insurancePolicy.latest_insurance_policy_data.customer.document_type.name }} | {{ insurancePolicy.latest_insurance_policy_data.customer.document_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ insurancePolicy.latest_insurance_policy_data.insurance_company.name }}
                                <br>
                                {{ insurancePolicy.latest_insurance_policy_data.customer.customer_type.name }}
                            </td>
                            <td class="px-6 py-4">

                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                    {{ insurancePolicy.latest_insurance_policy_data.assets.length }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                $ {{ insurancePolicy.latest_insurance_policy_data.netPremium.toFixed(2) }}
                            </td>
                            <td class="px-6 py-4">
                                $ {{ insurancePolicy.latest_insurance_policy_data.totalComission.toFixed(2) }} <br>  % {{ insurancePolicy.latest_insurance_policy_data.comission }}
                            </td>
                            <td class="px-6 py-4">
                                {{ insurancePolicy.latest_insurance_policy_data.start_date }}
                                <br>
                                <span class="ml-8">-</span>
                                <br>
                                {{ insurancePolicy.latest_insurance_policy_data.end_date }}
                            </td>
                            <td class="px-6 py-4">
                                <a :href="'/admin/insurance_policies/show/' + insurancePolicy.id">
                                    <i class="fa-solid fa-eye text-3xl text-indigo-600 cursor-pointer ml-2"></i>
                                </a>
                                <i class="fa-solid fa-square-pen text-3xl text-yellow-500 cursor-pointer ml-2"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div role="status" class="flex justify-center" v-else>
                    <svg aria-hidden="true"
                        class="w-24 h-24 mr-2 mt-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <nav class="flex items-center justify-between p-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    <span class="font-semibold text-gray-900 dark:text-white">1 a 10</span> de
                    <span class="font-semibold text-gray-900 dark:text-white">100</span>
                </span>
                <ul class="inline-flex -space-x-px text-sm h-8">
                    <li v-for="(link, index) in 5" :key="index">
                        <a :href="link.url"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            v-if="link.url" v-html="link.label">
                        </a>
                        <span v-else v-html="link.label"
                            class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                        </span>
                    </li>
                </ul>
            </nav>
        </div>
    </AdminLayout>
</template>
<script>
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
export default {
    components: {
        Breadcrumb
    },
    props: ['breadcrumbs', 'insurancePolicies'],
    data() {
        return {
            insurancePolicies: null,
            search: null,
            loading: false,
        };
    },
    methods: {
        showModal(id) {
            let modal = document.getElementById(id);
            modal.classList.remove('slide-out-bck-center');
            modal.classList.remove('no-display');
        },
        async fetchInsurancePolicies() {
            this.loading = true;
            try {
                const response = await axios.get('/admin/insurance_policies/filter', {
                    params: {
                        search: this.search,
                    },
                });
                this.insurancePolicies = response.data;
            } catch (error) {
                console.log(error);
            }
            this.loading = false;
        },
    },
    mounted() {
        this.fetchInsurancePolicies();
    },
    watch: {
        search: {
            handler() {
                this.fetchInsurancePolicies();
            },
            immediate: true,
        },
    },
};
</script>
