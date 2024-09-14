<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                    ? 'inline-flex items-center px-1 pt-1  active  text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:active transition'
                    : 'inline-flex items-center px-1 pt-1   text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:active focus:outline-none focus:text-gray-700 focus:active transition'
            }
        }
    })
</script>
