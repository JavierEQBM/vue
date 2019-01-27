<template>
    <div class="card mb-3">
        <div class="card-header">Publicado en {{throught.created_at}} - Editado en {{throught.updated_at}}</div>

        <div class="card-body">
            <input v-if="this.editMode" type="text" class="form-control" v-model="throught.description">
            <p v-else>{{throught.description}}</p>
        </div>

        <div class="card-footer">
            <button v-if="this.editMode" class="btn btn-success" v-on:click="update()">Guardar cambios</button>
            <button v-else class="btn btn-default" v-on:click="edit()">Editar</button>

            <button class="btn btn-danger" v-on:click="remove()">Eliminar</button>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['throught'],

        data() {
            return {
                editMode : false
            }
        },

        methods : {
            edit() {
                this.editMode = true;
            },

            update() {
                const params = {
                    description : this.throught.description
                };

                axios.put(`throughts/${this.throught.id}`, params)
                    .then((response) => {
                        this.editMode = false;
                        this.$emit('update', response.data);
                    });
            },

            remove() {
                axios.delete(`throughts/${this.throught.id}`)
                    .then(() => {
                        this.$emit('remove');
                    });
            }
        },

        mounted() {}
    }
</script>
