<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Біржа вантажів</h3></div>

                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                            <button class="btn btn-success">Додати</button>
                        </span>
                        </div>
                        <div class="tasks-list">
                            <table class="table table-sm">
                                <tr  v-for="load in loads">
                                    <th>{{ load.routes[0].date }}  </th>
                                    <th>{{ load.routes[0].from }} - {{ load.routes[0].to }}</th>
                                    <th>{{ load.name }}</th>
                                    <th>{{ load.weight }} т</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                loads: []
            }
        },
        methods: {
            showPosts(){
                axios.get('/api/loads/').then(response => {
                    this.loads = response.data
                    console.log(response.data)
                });
            }
        },
        mounted(){
            this.showPosts();
        }
    }
</script>

<!--<script>-->
<!--    import axios from 'axios';-->
<!--    export default {-->
<!--        mounted() {-->
<!--            this.fetchData()-->
<!--        },-->
<!--        data () {-->
<!--            return {-->
<!--                // routes: []-->
<!--                loads:[]-->
<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            fetchData () {-->
<!--                axios.get('/api/loads/')-->
<!--                    .then((response) => {-->
<!--                        // this.routes = response.data-->
<!--                        this.loads = response.data-->
<!--                        console.log(response.data)-->
<!--                    })-->
<!--                    .catch((err) => {-->
<!--                        console.log(err)-->
<!--                    })-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->
