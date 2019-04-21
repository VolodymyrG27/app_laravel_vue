<template>
    <div class="card mb-4">
        <div class="card-header">What do you think?</div>
            <div class="card-body">
                <form action="" v-on:submit.prevent="newPost()">
                    <div class="form-grop">
                        <label for="">Now I am thinking of:</label>
                        <input type="text" class="form-control" name="full" v-model="description">
                    </div>
                        <button type="submit" class="btn btn-primary mt-3">Send</button>
                </form>
            </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                description: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newPost() {
                const params = {
                    description: this.description
                };
                this.description = '';

                axios.post('/posts', this.params)
                    .then((response) => {
                        const post = response.data;
                        this.$emit('new', post);
                    });
            }
        }
    }
</script>
