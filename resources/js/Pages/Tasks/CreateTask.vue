<template>
    <AppLayout :view="this.___('tasks.view_name')">
        <!-- Tasks View -->
        <v-container class="fill-height flex justify-center align-center">
            <v-card :width="width" rounded>
                <!-- Alerts -->
                <div class="px-4" v-if="this.created">
                    <v-alert class="mt-4" dense type="success" dismissible transition="scroll-y-transition">
                        {{___('tasks.created')}}
                    </v-alert>
                </div>
                <!-- Create Task Form -->
                <v-card-text>
                    <v-form>
                        <v-text-field
                            v-model="form.name"
                            :error-messages="form.errors.name"
                            :label="this.___('tasks.task_name_label')"
                        ></v-text-field>
                    </v-form>
                    <WSYWIG :editor="editor"/>
                </v-card-text>
                <!-- Task form actions -->
                <v-card-actions>
                    <v-btn @click="submit" color="primary" dark>
                        {{ ___('tasks.create_task_button') }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Pages/Layouts/AppLayout";
import WSYWIG from "@/Pages/Components/WSYWIG";
import {Editor} from "@tiptap/vue-2";
import {defaultExtensions} from "@tiptap/starter-kit";
import {Placeholder} from '@tiptap/extension-placeholder';

export default {
    name: "CreateTask",
    components: {AppLayout, WSYWIG},
    data(){
        return {
            // Setup form and wsywig data
            editor: null,
            created: false,
            form: this.$inertia.form({
                name: '',
                description: ''
            })
        }
    },
    computed: {
        // Auto adjust card width to fit content inside
        width(){
            switch (this.$vuetify.breakpoint.name){
                default: return 'max-content'
            }
        }
    },
    methods: {
        // Submit form function
        submit() {
            this.form.transform((data) => ({
                ...data,
                description: this.editor.getHTML()
            }))
            .post(this.$route('items.store'), {
                onSuccess: () => {
                    this.form.reset('name');
                    this.editor.commands.clearContent();
                    this.created = true;
                }
            });
        }
    },
    mounted() {
        // Initialize a new wsywig editor object
        this.editor = new Editor({
            extensions: [
                ...defaultExtensions(),
                Placeholder.configure({
                    placeholder: this.___('tasks.wsywig_placeholder')
                })
            ]
        })
    },
    // Destroy the wsywig
    beforeDestroy() {
        this.editor.destroy()
    }
}
</script>

<style scoped>

</style>
