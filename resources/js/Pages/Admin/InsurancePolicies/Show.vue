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
                    <div class="mt-2 grid grid-cols-1 gap-x-2 gap-y-4 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Número de póliza
                                <button type="button" disabled
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <div
                                    class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">N° | </span>
                                    <input type="text" name="number" id="number" autocomplete="number"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="000001" disabled v-model="insurancePolicy.number">
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Contratante
                                <button type="button"
                                    class="ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-user-plus font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <v-select v-model="insurance_policy.insurance_policy_data.customer_id" :options="customers"
                                    disabled :reduce="customer => customer.id" label="name"></v-select>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Companía de Seguros
                                <button type="button" disabled
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <v-select v-model="insurance_policy.insurance_policy_data.insurance_company_id" disabled
                                    :options="insurance_companies" :reduce="insurance_company => insurance_company.id"
                                    label="name"></v-select>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Inicio de Vigencia
                            </label>
                            <div class="mt-4">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" v-model="insurance_policy.insurance_policy_data.start_date" disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Fin de Vigencia
                            </label>
                            <div class="mt-4">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" v-model="insurance_policy.insurance_policy_data.end_date" disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                T. comisión
                                <button type="button" disabled
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
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

                        <div class="sm:col-span-1">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Comisión
                                <button type="button" disabled
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
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
                    VALOR AS.	   </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Activos</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Lista de activos Asegurados
                    </p>
                    <div class="sm:col-span-3 overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500  table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Valor Asegurado
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha de Vigencia
                                    </th>
                                    <th scope="col" class="px-6 py-3 overflow-x">
                                        Atributos
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(asset, index) in assets" class="bg-white border-b hover:bg-gray-50 ">
                                    <td scope="row" class="px-6 py-4">
                                        {{ asset.asset_type.name }}
                                        <br>
                                        <span v-if="asset.incidents.length > 0">
                                            <div class="ml-1 h-2.5 w-2.5 rounded-full bg-red-500"></div>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ asset.insured_amount }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ asset.vigency_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <table class="w-full text-sm text-left text-gray-500 table">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-100  ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center"
                                                        v-for="attribute in asset.asset_type.attributes">
                                                        {{ attribute.name }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-white border-b hover:bg-white">
                                                    <td class="px-6 py-4"
                                                        v-for="attributeData in asset.assets_attributes_data">
                                                        {{ attributeData.value }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="px-6 py-4">
                                        <i @click="showModal('Asset-' + index)"
                                            class="fa-solid fa-eye text-3xl text-blue-500 cursor-pointer ml-2"></i>
                                    </td>
                                    <ShowAsset :id="'Asset-' + index" :asset_id="asset.id" :asset="asset"
                                        :assets_attributes_data="asset.assets_attributes_data" />
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Archivos de la póliza</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Imágenes, PDF's, Excel y cualquier tipo de documento que esté relacionado a la poliza
                    </p>
                    <div class="overflow-x-auto" v-if="files.length > 0">
                        <table class="w-full text-sm text-left text-gray-500 table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre del archivo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="file in files" class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ file.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" class="text-blue-500 hover:text-blue-700" @click="openFile(file.path)">
                                            <i class="fa-solid fa-eye text-xl"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="border-b border-gray-900/10 pb-2">
                    <div class="flex">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Endosos</h2>
                        <a @click="showModal('AddEndorse' + insurance_policy.number)"
                            class="ml-2 text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                            <i class="fa-solid fa-add text-md"></i>
                        </a>
                        <AddEndorse :id="'AddEndorse' + insurance_policy.number"
                            :insurancePolicy="insurancePolicy.latest_insurance_policy_data"
                            :insurance_billing_contact="insurance_billing_contact" :insuranced_people="insuranced_people" />
                    </div>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Endosos pertenecientes a esta póliza
                    </p>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500  table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
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
                                    class="bg-white border-b   hover:bg-gray-50 ">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                        <div class="">
                                            <div class="text-base font-semibold">{{ new
                                                Date(endorse.created_at).toLocaleDateString() }}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <span v-if="endorse.customer">
                                            {{ endorse.customer.name }}
                                            <br>
                                            {{ endorse.customer.document_type.name }} | {{ endorse.customer.document_number
                                            }}
                                        </span>
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
                                <div class="w-48 text-gray-900 bg-white border border-gray-200 rounded-lg   ">
                                    <button type="button" @click="removeFile(file)"
                                        class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700    dark:focus:ring-gray-500 dark:focus:text-white">
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
    props: ['breadcrumbs', 'insurancePolicy', 'insurance_billing_contact', 'insuranced_people', 'insurance_policies_data', 'assets', 'files'],
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
        openFile(path) {
            console.dir(path);
            path = '/storage/'+path;
            window.open(path, '_blank');
        },
        showModal(id) {
            let modal = document.getElementById(id);
            modal.classList.remove('slide-out-bck-center');
            modal.classList.remove('no-display');
        },
        formatActualAssets() {
            const formattedAssets = this.insurance_policy.insurance_policy_data.assets.map(asset => {
                let formattedAsset = {
                    "asset_type_id": asset.asset_type_id,
                    "asset_type_name": asset.asset_type.name,
                    "insured_amount": parseFloat(asset.insured_amount),
                    "vigency_date": asset.vigency_date,
                    "assets_attributes_data": {}
                };
                asset.assets_attributes_data.forEach(attribute => {
                    formattedAsset.assets_attributes_data[attribute.id] = attribute.value;
                });
                return formattedAsset;
            });
            this.insurance_policy.insurance_policy_data.assets = formattedAssets;
        }
    },
    mounted() {
        this.formatActualAssets();
    },
};
</script>
<style>
@import "vue-select/dist/vue-select.css";
</style>