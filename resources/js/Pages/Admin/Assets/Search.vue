<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
</script>
<template>
    <Head title="Dashboard" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <div class="py-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 border-b pb-5 border-gray-900/10">
            <div class="sm:col-span-4 col-span-12">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                    Tipo de Activo
                    <!-- Add People Modal-->
                    <button type="button" disabled
                        class="ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                        <i class="fa-solid fa-box font-xl"></i>
                    </button>
                </label>
                <div class="mt-2 bg-white">
                    <v-select v-model="assets_type_id" :options="assets_types" :reduce="assets_type => assets_type.id"
                        label="name"></v-select>
                </div>
            </div>
            <div class="sm:col-span-4 col-span-12" v-if="assets_types_attributes.length > 0">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                    Buscar Por:
                    <!-- Add People Modal-->
                    <button type="button" disabled
                        class="ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                        <i class="fa-solid fa-filter font-xl"></i>
                    </button>
                </label>
                <div class="mt-2 bg-white">
                    <v-select v-model="assets_types_attribute" :options="assets_types_attributes" label="name"></v-select>
                </div>
            </div>
            <div class="sm:col-span-4 col-span-12" v-if="assets_types_attribute">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                    Ingrese Valor Buscado:
                    <!-- Add People Modal-->
                    <button type="button" disabled
                        class="ml-2 text-white bg-gray-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                        <i class="fa-solid fa-search font-xl"></i>
                    </button>
                </label>
                <div class="bg-white">
                    <input :type="assets_types_attribute.input_type" name="name" id="name" v-model="searched_value"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-2 p-2.5  dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :placeholder="assets_types_attribute.example">
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500  table" v-if="result_assets">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Valor Asegurado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vigencia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Poliza
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Siniestro
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="result_asset in result_assets" class="bg-white border-b   hover:bg-gray-50 ">
                        <th class="px-6 py-4">
                            <div class="text-base font-semibold">
                                {{ result_asset[0].asset.asset_type.name }}
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ result_asset[0].asset.insured_amount }}
                        </td>
                        <td class="px-6 py-4">
                            {{ result_asset[0].asset.vigency_date }}
                        </td>
                        <td class="px-6 py-4">
                            <a
                                :href="'/admin/insurance_policies/show/' + result_asset[0].asset.insurance_policy_data.insurance_policy_id"
                                class="text-white bg-indigo-800 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                Poliza
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <a v-if="result_asset[0].asset.incidents.length > 0"
                                :href="'/admin/incidents/show/' + result_asset[0].asset.incidents[0].id"
                                class="text-white bg-red-800 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                                <i class="fa-solid fa-car-burst text-xl"></i>
                            </a>
                            <div v-else class="text-base font-semibold">
                                Ninguno
                            </div>
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
    </AdminLayout>
</template>
<script>
export default {
    components: {
    },
    props: ['breadcrumbs'],
    data() {
        return {
            assets_types: [],
            assets_types_attributes: [],
            assets_type_id: null,
            assets_types_attributes_id: null,
            assets_types_attribute: null,
            searched_value: [],
            result_assets: []
        };
    },
    methods: {
        async getAssetsTypes() {
            try {
                const response = await axios.get('/api/assets_types');
                this.assets_types = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async getAssetsTypesAttributes() {
            try {
                const response = await axios.get('/api/assets_types_attributes', {
                    params: {
                        assets_type_id: this.assets_type_id
                    }
                });
                this.assets_types_attributes = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async searchAssets() {
            this.result_assets = null;
            try {
                const response = await axios.get('/api/search_assets', {
                    params: {
                        asset_type_attribute_id: this.assets_types_attribute.id,
                        value: this.searched_value
                    }
                });
                this.result_assets = response.data;
            } catch (error) {
                console.log(error);
            }
        }
    },
    mounted() {
        this.getAssetsTypes();
    },
    watch: {
        assets_type_id() {
            this.getAssetsTypesAttributes();
        },
        searched_value() {
            this.searchAssets();
        }
    },
};
</script>