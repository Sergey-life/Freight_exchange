<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Біржа вантажів</h3></div>
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                              Додати
                            </button>
                                <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Додати вантаж</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form type="text" action="Loads.vue" method="post">
                                      <div class="row">
                                        <div class="col">
                                          <input type="text" class="form-control" placeholder="Дата" v-model="load.date"><br>
                                          <input type="text" class="form-control" placeholder="Звідки" v-model="load.from"><br>
                                          <input type="text" class="form-control" placeholder="Куди" v-model="load.to"><br>
                                          <input type="text" class="form-control" placeholder="Назва" v-model="load.name"><br>
                                          <input type="text" class="form-control" placeholder="Вага" v-model="load.weight">
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal" @click="create">Зберегти</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <p></p>
                        </span>
                        </div>
                        <div class="tasks-list">
                            <table class="table table-sm" v-for="load in loads.slice(0, 1)" :key="load.id">
                                <tr >
                                    <th scope="col">{{ load.routes[0].date }}</th>
                                    <th scope="col">{{ load.routes[0].from }} - {{ load.routes[0].to }}</th>
                                    <th scope="col">{{ load.name }}</th>
                                    <th scope="col">{{ load.weight }} т</th>
                                </tr>
                            </table>
                            <hr>
                            <iframe class="align-content-xl-center" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d20309.075323923767!2d30.4721233!3d50.4851493!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1588148756055!5m2!1sru!2sua" width="668" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe><br>
                            <p></p>
                            <table class="table table-sm">
                                <tr  v-for="load in loads">
                                    <td>{{ load.routes[0].date }}</td>
                                    <td>{{ load.routes[0].from }} - {{ load.routes[0].to }}</td>
                                    <td>{{ load.name }}</td>
                                    <td>{{ load.weight }} т</td>
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
    import axios from 'axios'
    export default {
        mounted() {
            this.fetchData()
        },
        data() {
            return {
                loads: [],
                load: {
                    date: '',
                    from: '',
                    to: '',
                    name: '',
                    weight: ''
                }
            }
        },
        methods: {
            fetchData() {
                axios.get('/api/loads')
                    .then((response) => {
                        this.loads = response.data
                        console.log(response.data)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },

            create() {
                axios.post('/api/loads', this.load)
                    .then((res) => {
                    this.loads.unshift(res.data)
                    this.load.date = ''
                    this.load.from = ''
                    this.load.to = ''
                    this.load.name = ''
                    this.load.weight = ''
                    console.log(res.data)
                })
                    .catch((err) => {
                        console.log(err)
                    });
                    location.reload()
            }
        }
    }
</script>
