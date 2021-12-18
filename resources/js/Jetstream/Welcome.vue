<template>
    <div>
        <div class="p-6 sm:px-20 bg-green-300 border-b border-gray-300">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Welcome to Inventory Management!
            </div>

            <div class="mt-6 text-gray-500">
                Our group decided to develop an inventory management system. 
                The system's main objective is to maintain the required inventory to run the production and sales process smoothly. 
                Along with its purposes, we implemented security features that can help in securing the data of the users and everything that will be stored in the system.
            </div>
        </div>

       
        </div>
   
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
    }
</script>
