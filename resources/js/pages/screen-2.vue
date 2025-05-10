<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const query = ref('');
const image = ref(null);
const page = ref(1);
const loading = ref(false);
let unsplash_data = [];
let imageIndex = 0;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Screen 2',
        href: '/screen-2',
    },
];
const search = async () => {
    if (!query.value) return;

    loading.value = true;
    try {
        const { data } = await axios.post('/search-unsplash', {
            query: query.value,
            page: page.value,
        });

        if (data.results.length === 0) {
            image.value = null;
            return;
        }
        unsplash_data = data.results;
        image.value = data.results[imageIndex] || null;
    } catch (error) {
        console.error(error);
        image.value = null;
    } finally {
        loading.value = false;
    }
};

const nextPage = () => {
   imageIndex++;
   image.value = unsplash_data[imageIndex];
    if (imageIndex >= unsplash_data.length) {
        imageIndex = 0; // Reset to the first image if we reach the end
        // add one to page
        page.value++;
        search();
    }
};

const prevPage = () => {
    if (imageIndex > 1) {
        imageIndex--;
       image.value = unsplash_data[imageIndex];
    if (imageIndex >= unsplash_data.length) {
        imageIndex = 0; // Reset to the first image if we reach the end
        search();
    }
    }
};
</script>

<template>
    <Head title="Screen 2 " />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="mx-auto max-w-xl p-6">
                <h2 class="mb-4 text-2xl font-bold">Unsplash Image Search</h2>

                <input
                    v-model="query"
                    @keyup.enter="search"
                    type="text"
                    placeholder="Search for images"
                    class="mb-4 w-full rounded border px-4 py-2"
                />

                <div v-if="loading">Loading...</div>

                <div v-if="image">
                    <img :src="image.urls.regular" :alt="image.alt_description" class="mb-4 rounded shadow" />
                    <div class="flex justify-between">
                        <button @click="prevPage" :disabled="page <= 1" class="rounded bg-gray-700 px-4 py-2 text-white disabled:opacity-50">
                            ← Previous
                        </button>
                        <button @click="nextPage" class="rounded bg-gray-700 px-4 py-2 text-white">Next →</button>
                    </div>
                </div>

                <div v-if="!loading && !image && query">
                    <p>No results found.</p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
