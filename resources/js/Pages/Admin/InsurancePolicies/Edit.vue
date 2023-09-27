<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
import AddCustomer from './Modals/AddCustomer.vue';
import AddPeopleToInsurance from './Modals/AddPeopleToInsurance.vue';
import AddNewAsset from './Modals/AddNewAsset.vue';
import AddFile from './Modals/AddFile.vue';
</script>
<template>
    <Head title="Editar Póliza" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <form class="px-2" @submit.prevent="submit">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Crear una póliza nueva</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Asegúrate de llenar todos los campos
                    </p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Número de póliza
                                <button type="button" 
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <div
                                    class="bg-white flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">N° | </span>
                                    <!-- Search and Select People-->
                                    <input type="text" name="number" id="number" autocomplete="number"
                                        v-model="insurance_policy.number"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="000001">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Contratante
                                <!-- Add People Modal-->
                                <button type="button" @click="showModal('AddCustomer')"
                                    class="ml-2 text-white bg-green-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-user-plus font-xl"></i>
                                </button>
                                <AddCustomer :id="'AddCustomer'" @customer-added="handleNewCustomer" />
                            </label>
                            <div class="mt-2">
                                <!-- Search and Select Customers-->
                                <v-select v-model="insurance_policy.insurance_policy_data.customer_id" :options="customers"
                                    :reduce="customer => customer.id" label="name"></v-select>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Companía de Seguros
                                <button type="button" 
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <v-select v-model="insurance_policy.insurance_policy_data.insurance_company_id"
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
                                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" v-model="insurance_policy.insurance_policy_data.start_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" v-model="insurance_policy.insurance_policy_data.end_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">
                                Tipo de comisión
                                <button type="button" 
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <div class="sm:col-span-3">
                                    <div class="mt-2">
                                        <select id="country" name="country" autocomplete="country-name"
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
                                <button type="button" 
                                    class="ml-2 text-white bg-gray-800 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                    <i class="fa-solid fa-tag font-xl"></i>
                                </button>
                            </label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">% |</span>
                                    <!-- Search and Select People-->
                                    <input type="number" name="number" id="number" autocomplete="number"
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
                                    <input type="number"
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
                                    <input type="text" v-model="insurance_policy.insurance_policy_data.risk_rate"
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
                    <button type="button" @click="showModal('NewAsset')"
                        class="mt-1 text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                        Añadir Activo
                        <i class="ml-2 fa-solid fa-plus font-xl"></i>
                    </button>
                    <AddNewAsset :id="'NewAsset'" @asset-added="handleNewAsset" />
                    <div class="sm:col-span-3">
                        <div class="mt-10 grid grid-cols-8  gap-y-4">
                            <div v-for="asset in insurance_policy.insurance_policy_data.assets"
                                class="sm:col-span-1 md:col-span-2 col-span-4">
                                <div
                                    class="w-48 text-gray-900 bg-white border border-gray-200 rounded-lg   ">
                                    <button type="button" @click="removeAsset(asset)"
                                        class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700    dark:focus:ring-gray-500 dark:focus:text-white">
                                        <i class="fa-solid fa-kaaba mr-2"></i>
                                        {{ asset.asset_type_name }} | {{ asset.insured_amount }}
                                        <br>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Archivos de la póliza</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Imágenes, PDF's, Excel y cualquier tipo de documento que esté relacionado a la poliza
                    </p>
                    <button type="button" @click="showModal('AddFile')"
                        class="mt-1 text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                        Añadir Archivo
                        <i class="ml-2 fa-solid fa-plus font-xl"></i>
                    </button>
                    <AddFile :id="'AddFile'" @file-added="handleNewFile" />
                    <div class="sm:col-span-3">
                        <div class="mt-10 grid grid-cols-8 gap-y-4">
                            <div v-for="file in insurance_policy.insurance_policy_data.files"
                                class="sm:col-span-4 md:col-span-2 col-span-4">
                                <div
                                    class="w-48 text-gray-900 bg-white border border-gray-200 rounded-lg   ">
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
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                <button type="submit" @click="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Guardar
                </button>
            </div>
        </form>
    </AdminLayout>
</template>
<script>
export default {
    components: {
        AddCustomer, AddPeopleToInsurance, AddNewAsset, AddFile
    },
    props: ['breadcrumbs', 'general_settings', 'insurance_policies_data', 'insurancePolicy', 'insurance_billing_contact', 'insuranced_people', 'insurance_policies_data', 'assets',],
    data() {
        return {
            insurance_policy: {
                number: this.insurancePolicy.number,
                insurance_policy_data: {
                    customer_id: this.insurance_policies_data[0].customer_id,
                    insurance_policies_status_id: this.insurance_policies_data[0].status_id,
                    insurance_company_id: this.insurance_policies_data[0].insurance_company_id,
                    start_date: this.insurance_policies_data[0].start_date,
                    end_date: this.insurance_policies_data[0].end_date,
                    comission_type_id: this.insurance_policies_data[0].comission_type_id,
                    comission: this.insurance_policies_data[0].comission,
                    number_of_installments: this.insurance_policies_data[0].number_of_installments,
                    risk_rate: this.insurance_policies_data[0].risk_rate,
                    insurance_policy_insuranced_people: [],
                    assets: this.insurance_policies_data[0].assets,
                    files: [],
                    insurance_policies_data_files: [],
                },
            },
            customers: [],
            insurance_companies: [],
        };
    },
    methods: {
        async submit() {
            try {
                const response = await axios.put(`/admin/insurance_policies/update/${this.insurancePolicy.id}`, this.insurance_policy);
                // window.location.href = `/admin/insurance_policies`;
                // handle success (e.g., show notification, redirect)
            } catch (error) {
                console.log(error);
                // handle error (e.g., show error message)
            }
        },
        showModal(id) {
            let modal = document.getElementById(id);
            modal.classList.remove('slide-out-bck-center');
            modal.classList.remove('no-display');
        },
        async getCustomers() {
            try {
                const response = await axios.get('/api/customer');
                this.customers = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async getInsuranceCompanies() {
            try {
                const response = await axios.get('/api/insurance_companies');
                this.insurance_companies = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        handleNewFile(newFile) {
            this.insurance_policy.insurance_policy_data.files.push(newFile);
        },
        removeFile(fileToRemove) {
            const index = this.insurance_policy.insurance_policy_data.files.findIndex(file =>
                file.name === fileToRemove.name);
            if (index !== -1) {
                this.insurance_policy.insurance_policy_data.files.splice(index, 1);
            }
        },
        handleNewAsset(newAsset) {
            this.insurance_policy.insurance_policy_data.assets.push(newAsset);
        },
        removeAsset(assetToRemove) {
            const index = this.insurance_policy.insurance_policy_data.assets.findIndex(asset =>
                asset.asset_type_id === assetToRemove.asset_type_id &&
                asset.insured_amount === assetToRemove.insured_amount &&
                asset.vigency_date === assetToRemove.vigency_date
            );
            if (index !== -1) {
                this.insurance_policy.insurance_policy_data.assets.splice(index, 1);
            }
        },
        handleNewCustomer(newCustomer) {
            this.customers.push(newCustomer);
            this.insurance_policy.insurance_policy_data.customer_id = newCustomer.id;
        },
        handleNewPeople(newPeople) {
            console.table(newPeople);
            if (newPeople.type_id === 1) {
                this.removePeopleByType(1);
                this.insurance_policy.insurance_policy_data.insurance_policy_people.push(newPeople);
                this.setBillingContact(newPeople);
            } else if (newPeople.type_id === 2) {
                this.insurance_policy.insurance_policy_data.insurance_policy_people.push(newPeople);
                this.addInsurancedPeople(newPeople)
            }
        },
        removePeopleByType(type_id) {
            const index = this.insurance_policy.insurance_policy_data.insurance_policy_people.findIndex(person => person.type_id === type_id);
            if (index !== -1) {
                this.insurance_policy.insurance_policy_data.insurance_policy_people.splice(index, 1);
            }
        },
        setBillingContact(billingContact) {
            this.insurance_policy.insurance_policy_data.insurance_policy_billing_contact = billingContact;
        },
        addInsurancedPeople(people) {
            this.insurance_policy.insurance_policy_data.insurance_policy_insuranced_people.push(people);
        },
        removeInsurancedPeople(people) {
            this.removePeopleFromList(people, this.insurance_policy.insurance_policy_data.insurance_policy_insuranced_people);
            this.removePeopleFromList(people, this.insurance_policy.insurance_policy_data.insurance_policy_people);
        },
        removePeopleFromList(people, list) {
            const index = list.findIndex(p => p.document_number === people.document_number);
            if (index !== -1) {
                list.splice(index, 1);
            }
        }
    },
    mounted() {
        this.getCustomers();
        this.getInsuranceCompanies();
    },
};
</script>
<style>
@import "vue-select/dist/vue-select.css";
</style>