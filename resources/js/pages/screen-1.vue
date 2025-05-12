<script setup lang="ts">
import { ref, watch } from 'vue'
import { router, Head } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const props = defineProps({
  simples: Object,
  filters: Object
})

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Screen 1',
        href: '/screen-1',
    },
];
const search = ref(props.filters?.search || '')
let debounceTimeout = null

// Debounce search
watch(search, (value) => {
  clearTimeout(debounceTimeout)

  debounceTimeout = setTimeout(() => {
    if (value) {
      router.get('/screen-1', { search: value }, { preserveState: true, replace: true })
    } else {
      // If search is cleared, reload the first page
      router.get('/screen-1', {}, { preserveState: true, replace: true })
    }
  }, 300)
})

const submitSearch = () => {
  clearTimeout(debounceTimeout)
  router.get('/screen-1', { search: search.value }, { preserveState: true, replace: true })
}
</script>

<template>
    <Head title="Screen 1" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                <h1 class="text-2xl font-bold mb-4">Task List ( case sensitive )</h1>
            
                <input
                v-model="search"
                @keyup.enter="submitSearch"
                type="text"
                placeholder="Search by id, title, or notes"
                class="border px-4 py-2 mb-4 w-full rounded"
                />
            
                <table class="table-auto border-collapse w-full">
                <thead>
                    <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="entry in simples" :key="entry.id">
                    <td class="border px-4 py-2">{{ entry.id }}</td>
                    <td class="border px-4 py-2">{{ entry.title }}</td>
                    <td class="border px-4 py-2">{{ entry.status }}</td>
                    <td class="border px-4 py-2">{{ entry.notes }}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
