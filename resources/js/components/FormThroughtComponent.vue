<template>
    <div class="card mb-3">
        <div class="card-header">¿En qué estás pensando ahora?</div>

        <div class="card-body">
            <form action="" @submit.prevent="create()">
                <div class="form-group">
                    <label for="description">Ahora estoy pensando en:</label>
                    <input type="text" class="form-control" name="description" v-model="description">
                </div>

                <button type="submit" class="btn btn-primary">Enviar pensamiento</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                description : null
            }
        },

        methods: {
            create() {
                const params = {
                    description : this.description
                };

                this.description = null;

                axios.post('throughts', params)
                    .then((response) => {
                        const throught = response.data;
                        this.$emit('create', throught);
                    });
            }
        },

        mounted() {},
    }
</script>
