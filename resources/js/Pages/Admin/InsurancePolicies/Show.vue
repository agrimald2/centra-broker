<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
import AddEndorse from './AddEndorse.vue';
import ShowAsset from './Modals/ShowAsset.vue';
</script>
<template>
    <Head :title="insurancePolicy.number + '- Póliza'" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <form class="px-2">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">{{ 'Póliza N°' + insurancePolicy.number }}
                    </h2>
                    <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Número de póliza
                                <button type="button" disabled
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <div
                                    class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">N° | </span>
                                    <!-- Search and Select People-->
                                    <input type="text" name="number" id="number" autocomplete="number"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="000001" disabled v-model="insurancePolicy.number">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Contratante
                                <!-- Add People Modal-->
                                <button type="button"
                                    class="ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-user-plus font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <!-- Search and Select Customers-->
                                <v-select v-model="insurance_policy.insurance_policy_data.customer_id" :options="customers"
                                    disabled :reduce="customer => customer.id" label="name"></v-select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Responsable de pago
                                <!-- Add People Modal-->
                                <button type="button"
                                    class="ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-user-plus font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <!-- Search and Select Customers-->
                                <input type="text" placeholder="Responsable de pago" disabled
                                    v-model="insurance_policy.insurance_policy_data.insurance_policy_billing_contact.name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Persona(s) Asegurada
                                <button type="button"
                                    class="ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-address-card font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <ul class="m-auto divide-y divide-gray-200 bg-white border border-gray-200 rounded-lg ">
                                    <li v-for="people_in_insurance in insurance_policy.insurance_policy_data.insurance_policy_insuranced_people"
                                        class="pb-3 sm:pb-4 px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="w-8 h-8 rounded-full  border-2 border-gray-600"
                                                    src="https://i.ibb.co/Y8MbCRj/igor.jpg" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{ people_in_insurance.name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{ people_in_insurance.document_number }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Companía de Seguros
                                <button type="button" disabled
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <v-select v-model="insurance_policy.insurance_policy_data.insurance_company_id" disabled
                                    :options="insurance_companies" :reduce="insurance_company => insurance_company.id"
                                    label="name"></v-select>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Fecha de Inicio
                            </label>
                            <div class="mt-4">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" v-model="insurance_policy.insurance_policy_data.start_date" disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Fecha de Vigencia
                            </label>
                            <div class="mt-4">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" v-model="insurance_policy.insurance_policy_data.end_date" disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Tipo de comisión
                                <button type="button" disabled
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <div class="sm:col-span-3">
                                    <div class="mt-2">
                                        <select id="country" name="country" autocomplete="country-name" disabled
                                            v-model="insurance_policy.insurance_policy_data.comission_type_id"
                                            class=" bg-transparent block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="1" selected>% | PORCENTAJE</option>
                                            <option value="2">N° | NUMÉRICA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Comisión
                                <button type="button" disabled
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">% |</span>
                                    <!-- Search and Select People-->
                                    <input type="number" name="number" id="number" autocomplete="number" disabled
                                        v-model="insurance_policy.insurance_policy_data.comission"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="12.0">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-1 col-span">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                N° Cuotas
                            </label>
                            <div class="mt-5">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-700 sm:text-sm">N°</span>
                                    <input type="number" disabled
                                        v-model="insurance_policy.insurance_policy_data.number_of_installments"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="5">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Tasa de riesgo
                            </label>
                            <div class="mt-5">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-700 sm:text-sm">%</span>
                                    <input type="number" v-model="insurance_policy.insurance_policy_data.risk_rate" disabled
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="2.8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Activos</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Lista de activos Asegurados
                    </p>
                    <div class="sm:col-span-3">
                        <div class="mt-2 grid grid-cols-8  gap-y-4">
                            <div v-for="asset in insurance_policy.insurance_policy_data.assets"
                                class="sm:col-span-1 md:col-span-2 col-span-4">
                                <div
                                    class="w-48 text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <button type="button" @click="showModal('Asset-' + asset.id)"
                                        class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fa-solid fa-kaaba mr-2"></i>
                                        {{ asset.asset_type_name }} | {{ asset.insured_amount }}
                                        <br>
                                    </button>
                                </div>
                                <ShowAsset :id="'Asset-' + asset.id" :asset="asset" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Archivos de la póliza</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Imágenes, PDF's, Excel y cualquier tipo de documento que esté relacionado a la poliza
                    </p>
                    <div class="sm:col-span-3">
                        <div class="mt-2 grid grid-cols-8 gap-y-4">
                            <div v-for="file in insurance_policy.insurance_policy_data.files"
                                class="sm:col-span-4 md:col-span-2 col-span-4">
                                <div
                                    class="w-48 text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <button type="button" @click="removeFile(file)"
                                        class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fa-solid fa-file mr-2"></i>
                                        <span>{{ file.name.length > 10 ? file.name.slice(0, 10) + '...' : file.name
                                        }}</span>
                                        <br>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-b border-gray-900/10 pb-2">
                    <div class="flex">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Endosos</h2>
                        <a @click="showModal('AddEndorse' + insurance_policy.number)"
                            class="ml-2 text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                            <i class="fa-solid fa-add text-md"></i>
                        </a>
                        <AddEndorse :id="'AddEndorse' + insurance_policy.number" :insurancePolicy="insurancePolicy.latest_insurance_policy_data"
                            :insurance_billing_contact="insurance_billing_contact" :insuranced_people="insuranced_people">
                    </div>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Endosos pertenecientes a esta póliza
                    </p>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cliente
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        N° Activos
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
                                <tr v-for="endorse in insurance_policies_data"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="">
                                            <div class="text-base font-semibold">{{ new
                                                Date(endorse.created_at).toLocaleDateString() }}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ endorse.customer.name }}
                                        <br>
                                        {{ endorse.customer.document_type.name }} | {{ endorse.customer.document_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                            {{ endorse.assets.length }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        $ {{ endorse.totalComission.toFixed(2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ endorse.end_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a :href="'/admin/insurance_policies/show/' + insurancePolicy.id">
                                            <i class="fa-solid fa-eye text-3xl text-indigo-600 cursor-pointer ml-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sm:col-span-3">
                        <div class="mt-2 grid grid-cols-8 gap-y-4">
                            <div v-for="file in insurance_policy.insurance_policy_data.files"
                                class="sm:col-span-4 md:col-span-2 col-span-4">
                                <div
                                    class="w-48 text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <button type="button" @click="removeFile(file)"
                                        class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fa-solid fa-file mr-2"></i>
                                        <span>{{ file.name.length > 10 ? file.name.slice(0, 10) + '...' : file.name
                                        }}</span>
                                        <br>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </AdminLayout>
</template>
<script>
export default {
    components: {
        ShowAsset, AddEndorse
    },
    props: ['breadcrumbs', 'insurancePolicy', 'insurance_billing_contact', 'insuranced_people', 'insurance_policies_data'],
    data() {
        return {
            insurance_policy: {
                number: this.insurancePolicy.number,
                insurance_policy_data: {
                    customer_id: this.insurancePolicy.latest_insurance_policy_data.customer,
                    insurance_policies_status_id: 1,
                    insurance_company_id: this.insurancePolicy.latest_insurance_policy_data.insurance_company,
                    start_date: this.insurancePolicy.latest_insurance_policy_data.start_date,
                    end_date: this.insurancePolicy.latest_insurance_policy_data.start_date,
                    comission_type_id: this.insurancePolicy.latest_insurance_policy_data.comission_type_id,
                    comission: this.insurancePolicy.latest_insurance_policy_data.comission,
                    number_of_installments: this.insurancePolicy.latest_insurance_policy_data.number_of_installments,
                    risk_rate: this.insurancePolicy.latest_insurance_policy_data.risk_rate,
                    insurance_policy_people: this.insurancePolicy.latest_insurance_policy_data.people,
                    insurance_policy_billing_contact: this.insurance_billing_contact,
                    insurance_policy_insuranced_people: this.insuranced_people,
                    assets: this.insurancePolicy.latest_insurance_policy_data.assets,
                    files: [],
                    insurance_policies_data_files: [],
                },
            },
        };
    },
    methods: {
        showModal(id) {
            let modal = document.getElementById(id);
            modal.classList.remove('slide-out-bck-center');
            modal.classList.remove('no-display');
        },
    },
    mounted() {

    },
};
</script>
<style>
@import "vue-select/dist/vue-select.css";
</style>