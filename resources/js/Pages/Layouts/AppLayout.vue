<template>
    <v-app>
        <!-- Main Nav -->
        <Navbar :view="view"></Navbar>

        <!-- Main container -->
        <v-main>
            <div class="pa-4 mt-8">
                <slot></slot>
            </div>
        </v-main>
    </v-app>
</template>

<script>
import Navbar from "@/Pages/Components/Navbar";
export default {
    name: "AppLayout",
    components: {Navbar},
    props: ['view']
}
</script>
