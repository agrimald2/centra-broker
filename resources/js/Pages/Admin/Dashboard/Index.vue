<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import GridExample from '@/Components/Flowbite/Layout/GridExample.vue';
import { Head } from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Flowbite/Navigation/Breadcrumb.vue';
</script>
<template>
    <Head title="Dashboard" />
    <AdminLayout>
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <p class="font-bold text-xl ">Dashboard de estadísticas</p>
        <GridExample />
    </AdminLayout>
</template>
<script>
export default {
    components: {
    },
    props: ['breadcrumbs'],
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