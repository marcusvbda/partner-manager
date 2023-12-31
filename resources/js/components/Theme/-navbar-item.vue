<!-- eslint-disable max-len -->
<template>
    <div class="relative" @click="clicked" ref="item">
        <a
            type="button"
            :class="[
                a_class,
                isActive(item) ? 'text-neutral-400' : '',
                'dark:text-neutral-200',
            ]"
            aria-expanded="false"
            href="#"
            @click.prevent="clickLink"
        >
            {{ item.title }}
            <svg
                v-if="item.items.length"
                class="h-5 w-5 flex-none text-gray-400 ml-auto"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
            >
                <path
                    fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd"
                />
            </svg>
        </a>
        <div
            v-if="item.items.length && visible"
            :class="[
                'sm:absolute -left-8 top-full z-10 mt-3 max-w-md overflow-hidden',
                'rounded md:rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5',
                'dark:bg-gray-500',
            ]"
            :style="item.custom_style || ''"
        >
            <div class="p-4">
                <div
                    v-for="(opItem, index) in item.items.filter(
                        (x) => x.visible
                    )"
                    :key="index"
                    class="group relative flex items-center gap-x-6 rounded-lg p-2 text-sm leading-6 hover:bg-gray-50 dark:hover:bg-gray-800 transition ease-in-out duration-150"
                >
                    <div class="flex-auto w-full">
                        <a
                            :href="opItem.route"
                            class="m-0 block font-semibold text-gray-900 px-11 dark:text-white"
                        >
                            {{ opItem.title }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['item', 'a_class'],
    data() {
        return {
            visible: false,
        };
    },
    created() {
        this.$nextTick(() => {
            document.addEventListener('click', (evt) => {
                if (!this.$refs.item.contains(evt.target)) {
                    this.visible = false;
                }
            });
        });
    },
    methods: {
        clickLink() {
            if (this.item.route) {
                window.location.href = this.item.route;
            }
        },
        isActive(item) {
            return (
                (item?.items || []).some((x) =>
                    window.location.pathname.startsWith(x.route)
                ) || window.location.pathname.startsWith(item.route)
            );
        },
        clicked() {
            if (this.item.route) return;
            if (this.item.items.length) {
                this.visible = !this.visible;
            }
        },
    },
};
</script>
