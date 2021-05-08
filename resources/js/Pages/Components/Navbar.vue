<template>
    <v-card>
        <!-- Nav Drawer -->
        <v-navigation-drawer permanent expand-on-hover app>
            <!-- Profile List Item -->
            <v-list-item class="px-2" link>
                <v-list-item-avatar>
                        <v-icon size="32">mdi-account-circle</v-icon>
                </v-list-item-avatar>

                <v-list-item-title>
                    {{ user ? user.name : '' }}
                </v-list-item-title>
            </v-list-item>
            <v-divider class="my-2"></v-divider>
            <!-- All other nav items -->
            <Sidebar />
        </v-navigation-drawer>

        <v-app-bar color="indigo darken-2" app dense flat dark>
            <v-toolbar-title>{{ view }}</v-toolbar-title>
        </v-app-bar>
    </v-card>
</template>

<script>
import Sidebar from "@/Pages/Components/Sidebar";

export default {
    name: "Navbar",
    components: {Sidebar},
    props: ['view'],
    data: () => ({
        user: null
    }),
    created(){
        axios.get('/api/user').then( response => {
            this.user = response.data;
        })
    }
}
</script>

<style scoped>

</style>
