<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Биржа грузов</h3></div>
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                              Дабавить
                            </button>
                                <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Добавить груз</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form type="text" action="Loads.vue" method="post">
                                      <div class="row">
                                        <div class="col">
                                          <input type="text" class="form-control" placeholder="Дата" v-model="load.date"><br>
                                          <input type="text" class="form-control" placeholder="Откуда" v-model="load.from"><br>
                                          <input type="text" class="form-control" placeholder="Куда" v-model="load.to"><br>
                                          <input type="text" class="form-control" placeholder="Название груза" v-model="load.name"><br>
                                          <input type="text" class="form-control" placeholder="Вес" v-model="load.weight">
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal" @click="create" >Сохоанить</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </span>
                        </div>
                        <br>
                        <div class="tasks-list">
                            <table class="table table-sm" v-for="load in loads.slice(0, 1)">
                                <tr >
                                    <th scope="col">{{ load.date }}</th>
                                    <th scope="col">{{ load.from }} - {{ load.to }}</th>
                                    <th scope="col">{{ load.name }}</th>
                                    <th scope="col">{{ load.weight }} т</th>
                                </tr>
                            </table>

                            <hr>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2857730.944967061!2d30.347695014303085!3d50.1025413808885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1590056556645!5m2!1sru!2sua" width="668" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            <br>
                            <table class="table table-sm">
                                <tr  v-for="load in loads">
                                    <td>{{ load.date }}</td>
                                    <td>{{ load.from }} - {{ load.to }}</td>
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
    export default {
        data() {
            return {
                loads: '',
                load: {
                    date: '',
                    from: '',
                    to: '',
                    name: '',
                    weight: ''
                }
            }
        },
        mounted() {
            this.fetchData()
        },
        methods: {
            fetchData() {
                axios.get('/api/loads')
                    .then(response => {
                        this.loads = response.data
                        console.log(response.data)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },

            create() {
                this.fetchData()
                axios.post('/api/loads', this.load)
                    .then(res => {
                        this.loads.unshift(res.data)
                    this.load.date = '',
                    this.load.from = '',
                    this.load.to = '',
                    this.load.name = '',
                    this.load.weight = ''
                    console.log(res.data)

                })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
