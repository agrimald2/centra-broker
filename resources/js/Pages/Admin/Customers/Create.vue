<template>
    <div :id="id" tabindex="-1"
        class="no-display slide-in-fwd-center fixed inset-0 flex items-center justify-center z-50 w-full p-2 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative max-w-xl max-h-full m-auto" style="min-width: 30%;">
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
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Crear Cliente</h3>
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nombre
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <i class="fa-solid fa-signature"></i>
                                </div>
                                <input type="text" name="name" id="name" v-model="formData.name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John Doe">
                            </div>
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tipo de Cliente
                            </label>
                            <div class="relative">
                                <select id="customerTypes" name="customer_type_id" v-model="formData.customer_type_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option v-for="customer_type in customer_types" :value="customer_type.id"
                                        class="text-gray-900">
                                        {{ customer_type.name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-between gap-4">
                            <div>
                                <label for="documentTypes"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Documento</label>
                                <select id="documentTypes" name="document_type_id" v-model="formData.document_type_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option v-for="document_type in document_types" :value="document_type.id"
                                        class="text-gray-900">
                                        {{ document_type.name }}</option>
                                </select>
                            </div>
                            <div>
                                <label for="document_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Número
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <i class="fa-solid fa-passport"></i>
                                    </div>
                                    <input type="text" name="document_number" id="document_number"
                                        v-model="formData.document_number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John Doe">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Dirección
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                <input type="text" name="address" id="address" v-model="formData.address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Av. José Galvez Barrenechea 248">
                            </div>
                        </div>
                        <div>
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Celular
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <i class="fa-solid fa-mobile"></i>
                                </div>
                                <input type="text" name="phone_number" id="phone_number" v-model="formData.phone_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John Doe">
                            </div>
                        </div>
                        <div>
                            <label for="email-address-icon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                                Electrónico</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <input type="email" v-model="formData.email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com">
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
            formData: {
                name: '',
                email: '',
                address: '',
                phone_number: '',
                password: '',
                document_type_id: '',
                document_number: '',
                customer_type_id: '',
            },
            document_types: [],
            customer_types: [],
        };
    },
    methods: {
        async submit() {
            try {
                const response = await axios.post('/admin/customers', this.formData);
                window.location.reload();
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
        async getDocumentTypes() {
            try {
                const response = await axios.get('/api/document_types');
                this.document_types = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async getCustomerTypes() {
            try {
                const response = await axios.get('/api/customer_types');
                this.customer_types = response.data;
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {
        this.getDocumentTypes();
        this.getCustomerTypes();
    },
};
</script>