<template>
    <li>
        <button type="button" @click="toggleDropdown"
            class="flex items-center p-2 w-full text-base text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">
            <i :class="icon + ' ' + color + ' ' + textsize"></i>
            <span class="ml-3">{{ text }}</span>
            <svg aria-hidden="true" class="ml-auto w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <ul :class="{ 'hidden': !isActive }" class="py-2 space-y-2">
            <li v-for="child in childs" :key="child.name">
                <a :href="child.href"
                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100  ">
                    {{ child.name }}</a>
            </li>
        </ul>
    </li>
</template>
<script>
export default {
    name: 'NavLink',
    props: {
        href: String,
        text: String,
        icon: String,
        childs: Array,
        color: {
            type: String,
            default: 'text-gray-500'
        },
        textsize: {
            type: String,
            default: 'text-xl'
        }
    },
    data() {
        return {
            isActive: false,
            color: 'text-gray-500',
            textsize: 'text-xl',
        };
    },
    methods: {
        toggleDropdown() {
            this.isActive = !this.isActive;
        }
    },
    mounted() {
    },
};
</script>