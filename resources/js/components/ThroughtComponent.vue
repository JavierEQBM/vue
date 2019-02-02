<template>
    <div class="card mb-3">
        <div class="card-header">Publicado en {{throught.created_at}} - Editado en {{throught.updated_at}}</div>

        <div class="card-body">
            <input v-if="this.editMode" type="text" class="form-control" v-model="throught.description">
            <p v-else v-text="throught.description"></p>
        </div>

        <div class="card-footer">
            <button v-if="this.editMode" class="btn btn-success" @click="update()">Guardar cambios</button>
            <button v-else class="btn btn-default" @click="edit()" :title="this.title_edit">Editar</button>

            <button class="btn btn-danger" @click="remove()" :title="this.title_delete">Eliminar</button>
        </div>
    </div>
</template>

<script>
    export default {
        props : [
            'throught'
        ],

        data() {
            return {
                editMode : false,
                title_edit : 'Editar elemento',
                title_delete : 'Eliminar elemento'
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
