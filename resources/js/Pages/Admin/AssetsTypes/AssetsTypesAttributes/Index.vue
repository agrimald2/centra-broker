<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Tipos de Documentos" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <div class="shadow-md sm:rounded-lg relative">
            <div class="shadow-md sm:rounded-lg relative">
                <div class="px-2 flex items-center justify-between py-4 bg-white dark:bg-gray-800">
                    <h1 class="font-bold ml-2 text-xl">{{ assets_type.name }}</h1>
                    <button type="button" @click="showModal('createAttribute')"
                        class="text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                        Añadir Atributo 
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
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ejemplo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(attribute, index) in assets_type.attributes"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <i class="fa-solid fa-passport text-3xl text-indigo-600"></i>
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">{{ attribute.name }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ attribute.description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ attribute.example }}
                                </td>
                                <td class="px-6 py-4">
                                    <i @click="showModal('editDocumentType' + assets_type.id)"
                                        class="fa-solid fa-square-pen text-3xl text-yellow-500 cursor-pointer ml-2"></i>
                                    <Edit :id="'editDocumentType' + assets_type.id" :assets_type="assets_type" />
                                    <i @click="deleteDocumentType(assets_type.id)"
                                        class="fa-solid fa-square-xmark text-3xl text-red-500 cursor-pointer ml-2"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Create :id="'createAttribute'" :assets_type="assets_type" />
    </AdminLayout>
</template> 
<script>
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
import Create from './Create.vue';
export default {
    components: {
        Create,
        Breadcrumb
    },
    props: ['breadcrumbs', 'assets_type'],
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
    },
    mounted() {
    },
};
</script>