<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form-throught-component @create="create"></form-throught-component>

            <h4  class="text-primary font-weight-bold">Pensamientos: {{length}}</h4>

            <throught-component 
                v-for="(throught, index) in throughts" 
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
        data() {
            return {
                mounted : false,
                throughts: []
            }
        },

        methods : {
            create(throught){
                this.throughts.unshift(throught);
            },

            update(throught){
                this.throughts[this.throughts.findIndex(throught => throught.id == throught.id)] = throught;
            },

            remove(index){
                this.throughts.splice(index, 1);
            }
        },

        computed : {
            length() {
                return this.throughts.length;
            }
        },

        mounted() {
            axios.get('throughts')
                .then((response) => {
                    this.throughts = response.data;
                    this.mounted = true;
                });
        }
    }
</script>
