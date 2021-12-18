<template>
    <admin-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-6 py-2 bg-green-200 overflow-hidden shadow-xl sm:rounded-lg">
            Our group decided to develop an inventory management system. 
            The system's main objective is to maintain the required inventory to run the production and sales process smoothly. 
            Along with its purposes, we implemented security features that can help in securing the data of the users and everything that will be stored in the system.
        </div>
        </div>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/AdminLayout'
    export default {
        components: {
           AdminLayout
        }
    }
</script>