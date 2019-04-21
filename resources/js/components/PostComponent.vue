<template>
    <div class="card">
                    <div class="card-header">Published on {{ post.create_at }} - update: {{ post.updated_at }}</div>
                    <div class="card-body">
                        <input v-if="editMode" type="text" class="form-control" v-model="post.description">
                        <p v-else>{{ post.description }}</p>
                    </div>
                    <div class="panel-footer ml-4 mb-4">
                        <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">Save</button>
                        <button v-else class="btn btn-secondary" v-on:click="onClickEdit()">Edit</button>
                        <button class="btn btn-danger" v-on:click="onClickDelete()">Delete</button>
                    </div>
                </div>
</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                editMode: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {
                axios.delete(`/posts/${this.post.id}`).then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {
                const params = {
                    description: this.post.description
                };
                axios.put(`/posts/${this.post.id}`, params).then((response) => {
                    this.editMode = false;
                    const post = response.data;
                    this.$emit('update', post);
                });
            }
        }
    }
</script>
