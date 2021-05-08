<template>
    <AppLayout view="My Tasks">
        <div class="fill-height mx-12">
            <!-- Tasks list -->
            <v-card>
                <v-card-title>
                    <p class="mb-0"><span class="error--text">Remaining:</span> {{ getRemaining() }}</p>
                    <v-divider class="mx-2" vertical/>
                    <p class="mb-0"><span class="success--text">Completed:</span> {{ getCompleted() }}</p>
                    <v-spacer></v-spacer>
                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-card-title>
                <v-data-table
                    :headers="headers"
                    :items="tasks"
                    :items-per-page="10"
                    :search="search"
                    multi-sort
                >
                    <!--show-select
                    :single-select="true"-->
                    <template v-slot:item.completed="{ item }">
                        <v-simple-checkbox @input="updateCompleted" v-model="item.completed"></v-simple-checkbox>
                    </template>
                </v-data-table>
            </v-card>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Pages/Layouts/AppLayout";

export default {
    name: "Dashboard",
    components: {AppLayout},
    props: ['items'],
    data(){
        return {
            search: '',
            headers: [
                {
                    text: 'Task Name',
                    align: 'start',
                    value: 'task_name'
                },
                {
                    text: 'Task Completed',
                    value: 'completed'
                },
                {
                    text: 'Task Completed At',
                    value: 'completed_at'
                }
            ],
            tasks: this.items
        }
    },
    methods: {
        getCompleted(){
            if(!this.items) return 0

            let total = 0;
            _.forEach(this.items, (item) => {
                if(item.completed) total++;
            });

            return total
        },
        getRemaining(){
            return this.items.length - this.getCompleted();
        },
        updateCompleted(item){
            this.$inertia.put(this.$route('items.update', ));
        }
    }
}
</script>

<style scoped>

</style>
