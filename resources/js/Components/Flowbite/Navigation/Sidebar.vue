<template>
    <aside
        class="slide-in-left fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">
                <NavLink href="/admin/dashboard" text="Dashboard" icon="fa-solid fa-dashboard" />
                <NavLink href="/admin/customers" text="Clientes" icon="fa-solid fa-user-tie" />
                <NavLinkDropdown text="Pólizas" icon="fa-solid fa-gear"
                    :childs="[{ name: 'Polizas de seguros', href: '/admin/insurance_policies' }, { name: 'Activos', href: '/' }]" />
                <NavLinkDropdown text="Siniestros" icon="fa-solid fa-car-burst"
                    :childs="[{ name: 'Registro de siniestros ', href: '/' }, { name: 'Activos', href: '/' }]" />
            </ul>
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200">
                <NavLink href="/admin/users" text="Usuarios" icon="fa-solid fa-users" />
                <NavLink href="/admin/insurance_companies" text="Aseguradoras" icon="fa-solid fa-building " />
                <NavLinkDropdown text="Configuración" icon="fa-solid fa-gear"
                    :childs="[{ name: 'Tipos de Clientes', href: '/admin/customer_types' }, { name: 'Tipos de Documentos', href: '/admin/document_types' }, { name: 'Estados de Pólizas', href: '/admin/insurance_policies_statuses' }, { name: 'Tipos de Activos', href: '/admin/assets_types' }]" />
            </ul>
        </div>
        <div class="absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white dark:bg-gray-800 z-20">
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    <i class="fa-solid fa-gear"></i>
                </button>
                <button type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    <i class="fa-solid fa-user"></i>
                </button>
                <button type="button" @click="goTo('')"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </div>
        </div>
    </aside>
</template>
<script>
import NavLink from '@/Components/Flowbite/Navigation/NavLink.vue';
import NavLinkDropdown from '@/Components/Flowbite/Navigation/NavLinkDropdown.vue';
export default {
    name: 'SideBar',
    components: {
        NavLink,
        NavLinkDropdown,
    },
    props: [''],
    data() {
        return {
        };
    },
    methods: {

    },
    mounted() {
    },
};
</script>