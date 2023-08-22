<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
</script>
<template>
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <div class="shadow-md sm:rounded-lg relative overflow-x-auto">
            <div class="px-2 flex items-center justify-between py-4 bg-white dark:bg-gray-800">
                <button type="button" @click="showModal('createUser')"
                    class="text-white bg-indigo-800 hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">
                    Añadir Usuario
                    <i class="ml-2 fa-solid fa-user-plus font-xl"></i>
                </button>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Documento
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
                    <tr v-for="(user, index) in users.data"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-bold text-lg">
                            {{ index + 1 }}
                        </td>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <i class="fa-solid fa-circle-user text-3xl text-indigo-600"></i>
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ user.name }}</div>
                                <div class="font-normal text-gray-500">{{ user.email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ user.document_type ? user.document_type.name : '' }}
                            <br>
                            {{ user.document_number }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center" v-if="!user.deleted_at">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Activo
                            </div>
                            <div class="flex items-center" v-else>
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Eliminado
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <i @click="showModal('editUser' + user.id)"
                                class="fa-solid fa-square-pen text-3xl text-yellow-500 cursor-pointer"></i>
                            <Edit :id="'editUser' + user.id" :document_types="document_types" :user="user" />
                            <i @click="deleteUser(user.id)"
                                class="fa-solid fa-square-xmark text-3xl text-red-500 cursor-pointer ml-2"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav class="flex items-center justify-between p-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    <span class="font-semibold text-gray-900 dark:text-white">{{ users.from }} a {{
                        users.to }}</span> de
                    <span class="font-semibold text-gray-900 dark:text-white">{{ users.total }}</span>
                </span>
                <ul class="inline-flex -space-x-px text-sm h-8">
                    <li v-for="(link, index) in users.links" :key="index">
                        <a :href="link.url"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            v-if="link.url" v-html="link.label">
                        </a>
                        <span v-else v-html="link.label"
                            class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                        </span>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Modals -->
        <Create :id="'createUser'" :document_types="document_types" />
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
    props: ['users', 'document_types', 'breadcrumbs'],
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
        async deleteUser(id) {
            try {
                const response = await axios.delete('/admin/users/' + id);
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