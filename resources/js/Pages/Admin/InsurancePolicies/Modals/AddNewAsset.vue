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
                    <h3 class="mb-4 text-xl font-medium text-gray-900 ">Añadir </h3>
                    <div class="space-y-2">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-1 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Tipo de activo
                                </label>
                                <div class="relative">
                                    <select v-model="this.asset_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option v-for="assets_type in assets_types" :value="assets_type"
                                            class="text-gray-900">
                                            {{ assets_type.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Persona Asegurada
                                </label>
                                <div class="relative">
                                    <input type="text" name="number" id="number" autocomplete="number"
                                        v-model="this.insuranced_people"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5"
                                        placeholder="Jhon Doe">
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Valor Asegurado
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <i class="fa-solid fa-sack-dollar"></i>
                                    </div>
                                    <input type="number" v-model="insured_amount"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="23,000">
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Moneda
                                </label>
                                <div class="relative">
                                    <select v-model="insured_amount_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg ring-blue-500 border-blue-500 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="USD" class="text-gray-900" selected>USD</option>
                                        <option value="PEN" class="text-gray-900">PEN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Tasa de riesgo
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <i class="fa-solid fa-percentage"></i>
                                    </div>
                                    <input type="number" v-model="risk_rate"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="23,000">
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="name" class="block mb-2 text-md font-bold text-gray-900 ">
                                    Inicio de Vigencia
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <i class="fa-solid fa-calendar"></i>
                                    </div>
                                    <input type="date" v-model="vigency_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full">
                            <hr class="w-64 h-px my-2 bg-gray-200 border-0 ">
                            <span
                                class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2  ">Información</span>
                        </div>

                        <div class="inline-flex items-center justify-center w-full" v-if="loading">
                            <div role="status" class="flex justify-center">
                                <svg aria-hidden=" true"
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

                        <div class="space-y-1" v-if="asset_type">
                            <div class="space-y-6" v-if="showCreateNewAttribute && !loading">
                                <div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i class="fa-solid fa-passport"></i>
                                        </div>
                                        <input type="text" name="name" id="name" v-model="newAttribute.name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="John Doe">
                                    </div>
                                </div>
                                <div>
                                    <select id="type" name="type" v-model="newAttribute.input_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="text" class="text-gray-900">
                                            Texto
                                        </option>
                                        <option value="number" class="text-gray-900">
                                            Numérico
                                        </option>
                                        <option value="date" class="text-gray-900">
                                            Fecha
                                        </option>
                                    </select>
                                </div>
                                <div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i class="fa-solid fa-audio-description"></i>
                                        </div>
                                        <input type="text" name="name" id="name" v-model="newAttribute.description"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="John Doe">
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i class="fa-solid fa-vial"></i>
                                        </div>
                                        <input type="text" name="name" id="name" v-model="newAttribute.example"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="John Doe">
                                    </div>
                                </div>
                                <button type="button" @click="addNewAttributeToAssetType"
                                    class="w-full text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase">Añadir
                                    Atributo</button>
                            </div>
                            <div v-if="asset_type.attributes.length == 0">
                                No hay ningún atributo para este activo
                            </div>
                            <div class="text-center">
                                <a class="text-indigo-500 font-bold cursor-pointer" @click="toggleShowCreateNewAttribute">
                                    añadir atributo </a>
                            </div>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div v-for="attribute in this.asset_type.attributes" class="sm:col-span-3" v-if="!loading">
                                    <label for="name" class="block mb-2 text-sm font-bold text-indigo-900 ">
                                        {{ attribute.name }}
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </div>
                                        <input :type="attribute.input_type" name="name" id="name"
                                            v-model="assets_attributes_data[attribute.id]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            :placeholder="attribute.example">
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
                        <button type="button" @click="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center    uppercase">Crear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import CreateAssetsTypeAttributes from '../../AssetsTypes/AssetsTypesAttributes/Create.vue'
export default {
    components: {},
    props: ['id', 'policy_vigency_date', 'policy_risk_rate'],
    data() {
        return {
            loading: false,
            assets_types: [],
            asset_type: null,
            insured_amount: null,
            insured_amount_type: 'USD',
            risk_rate: this.policy_risk_rate,
            vigency_date: this.policy_vigency_date,
            assets_attributes_data: {},
            insuranced_people: null,
            newAttribute: {
                assets_type_id: this.asset_type ? this.asset_type.id : null,
                name: '',
                input_type: 'text',
                description: '',
                example: ''
            },
            showCreateNewAttribute: false
        };
    },
    methods: {
        toggleShowCreateNewAttribute() {
            this.showCreateNewAttribute = !this.showCreateNewAttribute;
        },
        async submit() {
            try {
                const asset = {
                    asset_type_id: this.asset_type.id,
                    asset_type_name: this.asset_type.name,
                    insured_amount: this.insured_amount,
                    insured_amount_type: this.insured_amount_type,
                    risk_rate: this.risk_rate,
                    vigency_date: this.vigency_date,
                    assets_attributes_data: this.assets_attributes_data,
                    insuranced_people: this.insuranced_people,
                };
                this.$emit('asset-added', asset);
                this.hideModal();
                this.assets_attributes_data = {};
                this.asset_type_id = '';
                this.asset_type_name = '';
                this.insured_amount = '';
                this.insuranced_people = '';
                this.insured_amount_type = 'USD';
                this.risk_rate = '';
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
        async getAssetsTypes() {
            try {
                const response = await axios.get('/api/assets_types');
                this.assets_types = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async addNewAttributeToAssetType() {
            try {
                this.loading = true,
                    this.newAttribute.assets_type_id = this.asset_type.id;
                const response = await axios.post('/admin/add_assets_type_attribute', this.newAttribute);
                this.toggleShowCreateNewAttribute();
                await this.getAssetsTypes();
                this.asset_type = this.assets_types.find(asset_type => asset_type.id === this.newAttribute.assets_type_id);
                this.newAttribute = {
                    assets_type_id: this.asset_type ? this.asset_type.id : null,
                    name: '',
                    input_type: 'text',
                    description: '',
                    example: ''
                };
                this.loading = false
                // handle success (e.g., show notification, redirect)
            } catch (error) {
                console.log(error);
                // handle error (e.g., show error message)
            }
        },
    },
    mounted() {
        this.getAssetsTypes();
        this.vigency_date = this.policy_vigency_date;
        this.risk_rate = this.policy_risk_rate;
    },
    watch: {
        policy_vigency_date: {
            immediate: true,
            handler(newDate) {
                this.vigency_date = newDate;
            }
        }
    }
}
</script>