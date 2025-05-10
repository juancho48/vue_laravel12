<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue'
import axios from 'axios'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Screen 3',
        href: '/screen-3',
    },
];
const grid = ref([])

const fetchGrid = async () => {
  const { data } = await axios.get('/grid')
  grid.value = data
}

const handleClick = async (row, col) => {
  try {
    const { data } = await axios.post('/click', {
      grid: grid.value,
      row,
      col,
    })
    grid.value = data
  } catch (error) {
    console.error('Failed to update grid', error)
  }
}

onMounted(() => {
  fetchGrid()
})
</script>

<template>
    <Head title="Game" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="p-6 max-w-md mx-auto">
                <h2 class="text-xl font-bold mb-4">Red-Blue Grid Game</h2>
            
                <div v-if="grid.length" class="grid grid-cols-3 gap-2">
                    <div
                      v-for="(cell, index) in grid.flat()"
                      :key="index"
                      :class="[
                        'w-20 h-20 cursor-pointer border-2 rounded',
                        cell === 'red' ? 'bg-red-500' : 'bg-blue-500'
                      ]"
                      @click="handleClick(Math.floor(index / 3), index % 3)"
                    ></div>
                </div>
            
                <div v-else>
                  Loading grid...
                </div>
              </div>
        </div>
    </AppLayout>
</template>
