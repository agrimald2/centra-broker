<template>
  <div class="antialiased bg-gray-50 dark:bg-gray-900">
    <NavBar @toggle-sidebar="sidebarVisible = !sidebarVisible" />
    <Sidebar v-if="sidebarVisible" />
    <main class="p-4 md:ml-64 h-auto pt-20">
      <slot />
    </main>
  </div>
</template>
<script>
import Sidebar from '@/Components/Flowbite/Navigation/Sidebar.vue';
import NavBar from '@/Components/Flowbite/Navigation/NavBar.vue';
import GridExample from '@/Components/Flowbite/Layout/GridExample.vue';
export default {
  name: 'AdminLayout',
  components: {
    Sidebar,
    NavBar,
    GridExample
  },
  props: [''],
  data() {
    return {
      sidebarVisible: true,
    };
  },
  methods: {

  },
  mounted() {
  },
};
</script>