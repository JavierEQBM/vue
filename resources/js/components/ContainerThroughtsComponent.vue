<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form-throught-component @create="create"></form-throught-component>

            <h4  class="text-primary font-weight-bold">Pensamientos: {{this.length}}</h4>

            <throught-component 
                v-for="(throught, index) in data_throughts" 
                :key="throught.id" 
                :throught="throught"
                @update="update(...arguments)"
                @remove="remove(index)">
            </throught-component>
        </div>
    </div>
</template>

<script>
    export default {
        props : [
            'throughts'
        ],

        data() {
            return {
                data_throughts: []
            }
        },

        methods : {
            create(throught){
                this.data_throughts.unshift(throught);
            },

            update(throught){
                this.data_throughts[this.data_throughts.findIndex(t => t.id == throught.id)].updated_at = throught.updated_at;
            },

            remove(index){
                this.data_throughts.splice(index, 1);
            }
        },

        computed : {
            length() {
                return this.data_throughts.length;
            }
        },

        mounted() {
            this.data_throughts = this.throughts;
            //axios.get('throughts')
            //    .then((response) => {
            //        this.data_throughts = response.data;
            //    });
        }
    }
</script>
