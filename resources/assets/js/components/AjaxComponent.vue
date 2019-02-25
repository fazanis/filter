<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <label style="float: left; font-size: 28px">Мои задачи</label> <input type="text"
                                                                                          placeholder="Фильтр + поиск"
                                                                                          class="form-control"
                                                                                          style="width: 150px"
                                                                                          data-toggle="modal"
                                                                                          data-target="#myModal">

                    <table class="table tab-content">
                        <tr>
                            <td>Задания</td>
                        </tr>
                        <tr v-for="task in tasks">
                            <td>{{task.name}}</td>
                            <td>{{task.fio}}</td>
                        </tr>
                    </table>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <lable>Роль</lable>
                                        <select name="role_id" v-model="role_id" id="role_id" class="form-control">
                                            <option value="">Не указан</option>
                                            <option value="1">Роль1</option>
                                            <option value="2">Роль2</option>
                                            <option value="3">Роль3</option>
                                            <option value="4">Роль4</option>
                                        </select>
                                        <lable>
                                            Ответственный
                                        </lable>
                                        <input type="text" v-model="fio" name="fio" class="form-control">
                                        <lable>Постановщик</lable>
                                        <select name="users" v-model="users" id="users" multiple="multiple" style="width: 100%">
                                            <option value="Emory Jakubowski">Emory Jakubowski</option>
                                            <option value="Waldo Klein">Waldo Klein</option>
                                            <option value="Prof. Mandy Wuckert">Prof. Mandy Wuckert</option>
                                            <option value="Bailee Johns">Bailee Johns</option>
                                            <option value="Newell DuBuque">Newell DuBuque</option>
                                            <option value="Ms. Bridie Braun">Ms. Bridie Braun</option>
                                        </select>
                                        Название <input type="text" v-model="name" name="name" class="form-control">



                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" @click="reset()">Сбросить
                                    </button>
                                    <button @click="update()" class="btn btn-success">Найти</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                name: '',
                fio: '',
                users: '',
                tasks: [],
                role_id: '',
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            reset: function () {
                this.role_id = ''
                this.update()
            },
            update: function () {
                axios.get('/ajax', {
                    params: {
                        name: this.name,
                        fio: this.fio,
                        role_id: this.role_id,
                        users: this.users
                    }
                })
                    .then((response) => {
                        console.log(response.data)
                        this.tasks = response.data
                    });
            }
        }
    }
</script>
