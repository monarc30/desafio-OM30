<template>
    <div>
        <h3 class="text-center">Add Paciente</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addPaciente">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="paciente.title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="paciente.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Paciente</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                paciente: {}
            }
        },
        methods: {
            addPaciente() {
 
                this.axios
                    .post('http://localhost:8000/api/paciente/add', this.paciente)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>