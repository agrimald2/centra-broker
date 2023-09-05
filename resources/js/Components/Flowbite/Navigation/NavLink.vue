<template>
    <li>
        <a :href="href"
            class="flex items-center p-2 text-base rounded-lg hover:bg-gray-100 group">
            <i :class="icon + ' ' + color + ' ' + textsize"></i>
            <span class="ml-3">{{ text }}</span>
        </a>
    </li>
</template>
<script>
export default {
    name: 'NavLink',
    props: {
        href: String,
        text: String,
        icon: String,
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
        };
    },
    methods: {

    },
    mounted() {
    },
};
</script>