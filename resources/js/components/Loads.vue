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
                            <table class="table">
                                <thead v-for="load in loads" :key="load.id">
                                <tr>
                                    <th scope="col">{{load.loads.name}}</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                </table>
                                    <img class="img-responsive" src="http://kedrovaya.in.ua/delivery/img/ukraine.jpg" alt="Chania">
                                <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>load</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted() {
            this.fetchData()
        },
        data () {
            return {
                loads: [],
                // routes: []
            }
        },
        methods: {
            fetchData () {
                axios.get('/api/loads/')
                    .then((response) => {
                        // this.routes = response.data
                        this.loads = response.data
                        console.log(response)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
