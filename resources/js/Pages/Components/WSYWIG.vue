<template>
    <div>
        <!-- Button List -->
        <div v-if="editor">
            <v-btn icon title="Bold" @click="editor.chain().focus().toggleBold().run()" :input-value="editor.isActive('bold')">
                <v-icon>mdi-format-bold</v-icon>
            </v-btn>
            <v-btn icon title="Italic" @click="editor.chain().focus().toggleItalic().run()" :input-value="editor.isActive('italic')">
                <v-icon>mdi-format-italic</v-icon>
            </v-btn>
            <v-btn icon title="Strikethrough" @click="editor.chain().focus().toggleStrike().run()" :input-value="editor.isActive('strike')">
                <v-icon>mdi-format-strikethrough</v-icon>
            </v-btn>
            <v-btn icon title="Format as code" @click="editor.chain().focus().toggleCode().run()" :input-value="editor.isActive('code')">
                <v-icon>mdi-code-braces</v-icon>
            </v-btn>
            <v-btn icon title="Clear format" @click="editor.chain().focus().clearNodes().run()">
                <v-icon>mdi-format-clear</v-icon>
            </v-btn>
            <v-btn icon title="Paragraph" @click="editor.chain().focus().setParagraph().run()" :input-value="editor.isActive('paragraph')">
                <v-icon>mdi-format-paragraph</v-icon>
            </v-btn>
            <v-btn icon title="Header 1" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()" :input-value="editor.isActive('heading', { level: 1})">
                <v-icon>mdi-format-header-1</v-icon>
            </v-btn>
            <v-btn icon title="Header 2" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" :input-value="editor.isActive('heading', { level: 2})">
                <v-icon>mdi-format-header-2</v-icon>
            </v-btn>
            <v-btn icon title="Header 3" @click="editor.chain().focus().toggleHeading({ level: 3 }).run()" :input-value="editor.isActive('heading', { level: 3})">
                <v-icon>mdi-format-header-3</v-icon>
            </v-btn>
            <v-btn icon title="Header 4" @click="editor.chain().focus().toggleHeading({ level: 4 }).run()" :input-value="editor.isActive('heading', { level: 4})">
                <v-icon>mdi-format-header-4</v-icon>
            </v-btn>
            <v-btn icon title="Header 5" @click="editor.chain().focus().toggleHeading({ level: 5 }).run()" :input-value="editor.isActive('heading', { level: 5})">
                <v-icon>mdi-format-header-5</v-icon>
            </v-btn>
            <v-btn icon title="Header 6" @click="editor.chain().focus().toggleHeading({ level: 6 }).run()" :input-value="editor.isActive('heading', { level: 6})">
                <v-icon>mdi-format-header-6</v-icon>
            </v-btn>
            <v-btn icon title="Bullet List" @click="editor.chain().focus().toggleBulletList().run()" :input-value="editor.isActive('bulletList')">
                <v-icon>mdi-format-list-bulleted</v-icon>
            </v-btn>
            <v-btn icon title="Number List" @click="editor.chain().focus().toggleOrderedList().run()" :input-value="editor.isActive('orderedList')">
                <v-icon>mdi-format-list-numbered</v-icon>
            </v-btn>
            <v-btn icon title="Code block" @click="editor.chain().focus().toggleCodeBlock().run()" :input-value="editor.isActive('codeBlock')">
                <v-icon>mdi-code-tags</v-icon>
            </v-btn>
            <v-btn icon title="Block quote" @click="editor.chain().focus().toggleBlockquote().run()" :input-value="editor.isActive('blockquote')">
                <v-icon>mdi-comment-quote</v-icon>
            </v-btn>
            <v-btn icon title="Horizontal Rule" @click="editor.chain().focus().setHorizontalRule().run()">
                HR
            </v-btn>
            <v-btn icon title="Line Break" @click="editor.chain().focus().setHardBreak().run()">
                BR
            </v-btn>
            <v-btn icon title="Undo" @click="editor.chain().focus().undo().run()">
                <v-icon>mdi-undo</v-icon>
            </v-btn>
            <v-btn icon title="Redo" @click="editor.chain().focus().redo().run()">
                <v-icon>mdi-redo</v-icon>
            </v-btn>
        </div>
        <!-- The WSYWIG editor -->
        <editor-content :editor="editor"/>
    </div>
</template>

<script>
import { EditorContent } from '@tiptap/vue-2';

export default {
    components: {
        EditorContent,
    },
    props: ['editor'],
    data (){
        return {
            toggle1: [0,1,2,3,4,5,6,7,8],
            toggle2: [0,1,2,3,4,5,6,7,8]
        }
    }
}
</script>

<style scoped>

</style>
