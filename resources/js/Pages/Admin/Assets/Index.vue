<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Tipos de Clientes" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <div class="shadow-md sm:rounded-lg relative">
            <div class="px-4 flex flex-wrap items-center py-4 bg-white">
                <div class="mt-4 mx-2 w-full sm:w-auto">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                        Cliente
                    </label>
                    <select id="countries" v-model="filter.customer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option v-for="customer in customers" :value="customer.id">{{ customer.name }}</option>
                    </select>
                </div>
                <div class="mt-4 mx-2 w-full sm:w-auto">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                        Tipo de Activo
                    </label>
                    <select id="countries" v-model="filter.type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option v-for="asset_type in assets_types" :value="asset_type.id">{{ asset_type.name }}</option>
                    </select>
                </div>
                <div class="mt-4 mx-2 w-full sm:w-auto">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                        Inicio Vigencia
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input type="date" style="background-color: white;" v-model="filter.start_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date">
                    </div>
                </div>
                <div class="mt-4 mx-2 w-full sm:w-auto">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                        Fin Vigencia
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input type="date" style="background-color: white;" v-model="filter.end_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date">
                    </div>
                </div>
                <div class="mt-4 mx-2 pt-5 w-full sm:w-auto">
                    <button type="button" @click="exportToExcel()"
                        class="text-white bg-green-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                        <span class="hidden md:flex"> Excel</span>
                        <i class="ml-2 fa-solid fa-file-excel font-xl"></i>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N° Poliza
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Inicio Vigencia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fin Vigencia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cliente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Persona As.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Valor As.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Atributos
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TR | Comisión
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="asset in assets" class="bg-white border-b   hover:bg-gray-50 ">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                <div class="text-base font-semibold text-center">
                                    <a :href="'/admin/insurance_policies/show/'+asset.insurance_policy_id">{{ asset.insurance_policy_number }} {{ asset.insurance_policy_id }}</a>
                                    <br> <br>
                                    <button type="button" @click="addIncident(asset.id)" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-1 text-center uppercase">
                                        <i class="fa-solid fa-car-burst text-xl"></i>
                                    </button>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ asset.start_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ asset.end_date }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-base font-semibold">{{ asset.customer_name }} </span>
                                <br>
                                {{ asset.customer_document }}
                            </td>
                            <td class="px-6 py-4">
                                {{ asset.insuranced_people }}
                            </td>
                            <td class="px-6 py-4">
                                {{ asset.insuranced_amount }}
                            </td>
                            <td>
                                <table class="w-full text-sm text-left text-gray-500 table">
                                    <tbody>
                                        <tr v-for="attribute in asset.attributes"
                                            class="text-xs text-gray-700 uppercase bg-gray-100 border">
                                            <th scope="row" class="px-3 py-1 text-center">
                                                {{ attribute.name }}
                                            </th>
                                            <td class="flex items-center px-2 py-1 text-gray-900 whitespace-nowrap">
                                                {{ attribute.value }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="px-6 py-4">
                                {{ asset.risk_rate }}% | {{ asset.comission }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <Create :id="'createCustomerType'" />
    </AdminLayout>
</template> 
<script>
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
export default {
    components: {
        Breadcrumb
    },
    props: ['breadcrumbs'],
    data() {
        return {
            filter: {
                type: null,
                start_date: null,
                end_date: null,
                customer: null,
            },
            assets: [],
            customers: [],
            assets_types: [],
        };
    },
    methods: {
        showModal(id) {
            let modal = document.getElementById(id);
            modal.classList.remove('slide-out-bck-center');
            modal.classList.remove('no-display');
        },
        async fetchAssets() {
            try {
                const response = await axios.get('/admin/assets/get', {
                    params: {
                        customer: this.filter.customer,
                        type: this.filter.type,
                        start_date: this.filter.start_date,
                        end_date: this.filter.end_date
                    }
                });
                this.assets = response.data;
                console.table(this.assets);
            } catch (error) {
                console.log(error);
            }
        },
        async fetchCustomers() {
            try {
                const response = await axios.get('/api/customer', {
                });
                this.customers = response.data;
                console.log(response.data);
            } catch (error) {
                console.log(error);
            }
        },
        async fetchAssetsTypes() {
            try {
                const response = await axios.get('/api/assets_types', {
                });
                this.assets_types = response.data;
                console.log(response.data);
            } catch (error) {
                console.log(error);
            }
        },
        formatAssets() {
            if (!this.assets || !this.assets.length) return [];
            const formattedAssets = this.assets.map(asset => {
                let formattedAsset = {
                    "Nro Póliza": asset.insurance_policy_number,
                    "Inicio Vigencia": asset.start_date,
                    "Fin Vigencia": asset.end_date,
                    "Nombre Cliente": asset.customer_name,
                    "Documento Cliente": asset.customer_document,
                    "Personas aseguradas": asset.insuranced_people,
                    "Tasa de riesgo": asset.risk_rate,
                    "Valor asegurado": asset.insuranced_amount,
                    "Comisión %": asset.comission
                };
                if (asset.attributes && asset.attributes.length) {
                    asset.attributes.forEach(attr => {
                        formattedAsset[attr.name] = attr.value;
                    });
                }
                return formattedAsset;
            });
            console.dir(formattedAssets);
            return formattedAssets;
        },
        exportToExcel() {
            const exportData = this.formatAssets();
            if (!exportData || !exportData.length) return;
            const csvData = this.toCsv(exportData);

            const blob = new Blob([csvData], { type: "text/csv;charset=utf-8;" });
            const url = URL.createObjectURL(blob);

            const link = document.createElement("a");
            link.setAttribute("href", url);
            link.setAttribute("download", "ReporteDeActivo.csv");
            document.body.appendChild(link);
            link.click();
        },
        toCsv(data) {
            if (!data || !data.length) return '';
            const delimiter = ",";
            const keys = Object.keys(data[0]);

            const headerRow = keys.join(delimiter) + "\n";
            const bodyRows = data
                .map((row) => {
                    return keys
                        .map((key) => {
                            return '"' + row[key] + '"';
                        })
                        .join(delimiter);
                })
                .join("\n");

            return headerRow + bodyRows;
        },
        addIncident(id) {
            window.location.href = `/admin/incidents/create/${id}`;
        }
    },
    mounted() {
        this.fetchAssets();
        this.fetchCustomers();
        this.fetchAssetsTypes();
    },
    watch: {
        filter: {
            handler: 'fetchAssets',
            deep: true
        }
    }
};
</script>