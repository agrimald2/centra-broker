<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Tipos de Clientes" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <div class="shadow-md sm:rounded-lg relative">
            <div class="px-2 flex items-center justify-between py-4 bg-white ">
                <button type="button" @click="showModal('createInsuranceCompany')"
                    class="text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  dark:focus:ring-gray-600 mr-2 mb-2">
                    Aseguradora
                    <i class="ml-2 fa-solid fa-plus font-xl"></i>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
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
                        <tr v-for="(insurance_company, index) in insurance_companies"
                            class="bg-white border-b   hover:bg-gray-50 ">
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                <i class="fa-solid fa-building text-3xl text-indigo-600"></i>
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ insurance_company.name }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div class="flex items-center" v-if="!insurance_company.deleted_at">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Activo
                                </div>
                                <div class="flex items-center" v-else>
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Eliminado
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <i @click="showModal('editInsuranceCompany' + insurance_company.id)"
                                    class="fa-solid fa-square-pen text-3xl text-yellow-500 cursor-pointer ml-2"></i>
                                <Edit :id="'editInsuranceCompany' + insurance_company.id" :insurance_company="insurance_company" />
                                <i @click="deleteInsuranceCompany(insurance_company.id)"
                                    class="fa-solid fa-square-xmark text-3xl text-red-500 cursor-pointer ml-2"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <Create :id="'createInsuranceCompany'" />
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
    props: ['insurance_companies', 'breadcrumbs'],
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
        async deleteInsuranceCompany(id) {
            try {
                const response = await axios.delete('/admin/insurance_companies/' + id);
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