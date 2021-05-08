<template>
    <!-- Refresh Tasks -->
    <v-list color="transparent">
        <!-- Refresh Tasks -->
        <v-list-item v-for="(link, index) in links" :key="index" @click="link.href()" link>
            <v-list-item-icon>
                <v-icon>{{link.icon}}</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
                <v-list-item-title>{{link.name}}</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
    </v-list>

</template>

<script>
export default {
    name: "Sidebar",
    data() {
        return {
            links: [
                {
                    name: "Tasks list",
                    icon: "mdi-clipboard-list",
                    href: this.dashboard
                },
                {
                    name: "Create new task",
                    icon: "mdi-clipboard-plus",
                    href: this.create_task
                },
                {
                    name: "Logout",
                    icon: "mdi-logout",
                    href: this.logout
                }
            ]
        }
    },
    methods: {
        dashboard(){
            this.$inertia.get(this.$route('dashboard'))
        },
        create_task(){
            this.$inertia.get(this.$route('items.create'))
        },
        logout(){
            this.$inertia.post(this.$route('logout'))
        }
    }
}
</script>

<style scoped>

</style>
