<template>
    <div class="col-12">
        LARACAST FIRST COMPONENT

        <h1>La fecha es <span v-text="new Date()"></span></h1>

        <button class="btn btn-primary" @click="add">+1</button>
        <h4>Valor: {{this.value}}</h4>
        <h4>Valor + 10: <span v-text="computed_value"></span></h4>

        <div class="tasks mt-3">
            <div class="complete">
                <h3>Tareas completas:</h3>
                <ul>
                    <li v-for="task in completed_tasks" v-text="task.description" class="p-3 text-success"></li>
                </ul>
            </div>

            <div class="incomplete">
                <h3>Tareas incompletas</h3>
                <ul>
                    <li v-for="task in incompleted_tasks" class="p-3 text-danger">
                        <span v-text="task.description"></span> <button @click="complete_task(task.id)" class="btn btn-secondary">Completar</button>
                    </li>
                </ul>
            </div>

            <div class="mixed">
                <h3>Todas las tareas</h3>
                <ul>
                    <li v-for="task in tasks" class="p-3" :class="{'text-success' : task.completed, 'text-danger' : !task.completed}">
                        <span v-text="task.description"></span> <button v-if="!task.completed" @click="complete_task(task.id)" class="btn btn-secondary">Completar</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="slots bg-primary text-white p-3">
            <ul>
                <li><slot-component>Go to work <span>at 7</span></slot-component></li>
                <li><slot-component>Go to school <span>at 13</span></slot-component></li>
                <li><slot-component>Go to bank <span>at 15</span></slot-component></li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                value : 10,
                tasks : [
                    {description : 'Ir a la tienda', completed : true, id : 1},
                    {description : 'Terminar tutorial', completed : false, id : 2},
                    {description : 'Donar', completed : false, id : 3},
                    {description : 'Limpiar inbox', completed : false, id : 4},
                    {description : 'Hacer la cena', completed : false, id : 5},
                    {description : 'Limpiar habitación', completed : true, id : 6}
                ]
            }    
        },

        methods : {
           add() {
            this.value ++;
           },

           complete_task(id){
            this.tasks.find(task => task.id === id).completed = true;
           }
        },

        computed : {
            completed_tasks() {
                return this.tasks.filter(task => task.completed);
            },

            incompleted_tasks() {
                return this.tasks.filter(task => !task.completed);
            },

            computed_value() {
                return this.value + 10;
            }
        },

        mounted() {
           
        }
    }
</script>
