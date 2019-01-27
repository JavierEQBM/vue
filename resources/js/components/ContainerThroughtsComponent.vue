<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form-throught-component @create="create"></form-throught-component>

            <throught-component 
                v-for="(throught, index) in throughts" 
                :key="throught.id" 
                :throught="throught"
                @update="update(index, ...arguments)"
                @remove="remove(index)">
            </throught-component>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                throughts: []
            }
        },

        methods : {
            create(throught){
                this.throughts.push(throught);
            },

            update(index, throught){
                this.throughts[index] = throught;
            },

            remove(index){
                this.throughts.splice(index, 1);
            }
        },

        mounted() {
            axios.get('throughts')
                .then((response) => {
                    this.throughts = response.data;
                });
        }
    }
</script>
