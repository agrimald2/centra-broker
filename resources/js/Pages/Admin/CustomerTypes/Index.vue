<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Tipos de Clientes" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <div class="shadow-md sm:rounded-lg relative">
            <div class="px-2 flex items-center justify-between py-4 bg-white dark:bg-gray-800">
                <button type="button" @click="showModal('createCustomerType')"
                    class="text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                    Tipo de Cliente
                    <i class="ml-2 fa-solid fa-plus font-xl"></i>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Accción
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(customer_type, index) in customer_types"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <i class="fa-solid fa-person-military-to-person text-3xl text-indigo-600"></i>
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ customer_type.name }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div class="flex items-center" v-if="!customer_type.deleted_at">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Activo
                                </div>
                                <div class="flex items-center" v-else>
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Eliminado
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <i @click="showModal('editCustomerType' + customer_type.id)"
                                    class="fa-solid fa-square-pen text-3xl text-yellow-500 cursor-pointer ml-2"></i>
                                <Edit :id="'editCustomerType' + customer_type.id" :customer_type="customer_type" />
                                <i @click="deleteDocumentType(customer_type.id)"
                                    class="fa-solid fa-square-xmark text-3xl text-red-500 cursor-pointer ml-2"></i>
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
import Create from './Create.vue';
import Edit from './Edit.vue';
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
export default {
    components: {
        Create,
        Edit,
        Breadcrumb
    },
    props: ['customer_types', 'breadcrumbs'],
    data() {
        return {

        };
    },
    methods: {
        showModal(id) {
            let modal = document.getElementById(id);
            modal.classList.remove('slide-out-bck-center');
            modal.classList.remove('no-display');
        },
        async deleteDocumentType(id) {
            try {
                const response = await axios.delete('/admin/customer_types/' + id);
                window.location.reload();
                // handle success (e.g., show notification, redirect)
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {
    },
};
</script>