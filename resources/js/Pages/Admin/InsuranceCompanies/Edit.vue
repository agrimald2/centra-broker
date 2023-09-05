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
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar Companía de Seguros </h3>
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nombre
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <i class="fa-solid fa-passport"></i>
                                </div>
                                <input type="text" name="name" id="name" v-model="insurance_company.name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John Doe">
                            </div>
                        </div>
                        <button type="button" @click="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uppercase">
                            <span v-if="insurance_company.deleted_at">
                                {{ insurance_company.deleted_at ? 'Restaurar' : 'Editar' }}
                            </span>
                            <span v-else>
                                Editar
                            </span>
                        </button>
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
    props: ['id', 'insurance_company'],
    data() {
        return {
            insurance_company: this.insurance_company
        };
    },
    methods: {
        async submit() {
            try {
                const response = await axios.put('/admin/insurance_companies/' + this.insurance_company.id, this.insurance_company);
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
        }
    },
    mounted() { },
};
</script>