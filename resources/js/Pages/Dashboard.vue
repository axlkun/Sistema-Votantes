<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import BreadCroumbs from '@/OwnComponents/BreadCroumbs.vue';

const breadcrumbs = [
    {
        label: "Dashboard"
    }
];

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <BreadCroumbs :items="breadcrumbs"></BreadCroumbs>
        </template>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                        <div
                            class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25c0-3.727 3.023-6.75 6.75-6.75h1.5c3.727 0 6.75 3.023 6.75 6.75v.75H4.5v-.75z" />
                              </svg>
                              
                            <h5 class="mb-2 mt-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Votantes</h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Votantes registrados: 1231</p>

                            <p class="inline-flex items-center text-black-600">
                                Último añadido: Hace dos dias
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
