<template>
    <div>
        <h3 class="text-center">Add Paciente</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addPaciente">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="paciente.nome">
                    </div>
                    <div class="form-group">
                        <label>Nome da m&atilde;e</label>
                        <input type="text" class="form-control" v-model="paciente.mae">
                    </div>
                    <div class="form-group">
                        <label>Data de nascimento</label>
                        <input type="text" class="form-control" v-model="paciente.data_nascimento">
                    </div>
                    <div class="form-group">
                        <label>Cpf</label>
                        <input type="text" class="form-control" v-model="paciente.cpf">
                    </div>
                    <div class="form-group">
                        <label>CNS</label>
                        <input type="text" class="form-control" v-model="paciente.cns">
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <input type="text" class="form-control" v-model="paciente.file_path">
                    </div>
                    <div class="form-group">
                        <label>CEP</label>
                        <input type="text" class="form-control" v-model="paciente.cep">
                    </div>
                    <div class="form-group">
                        <label>Endere&ccedil;o</label>
                        <input type="text" class="form-control" v-model="paciente.endereco">
                    </div>
                    <div class="form-group">
                        <label>N&uacute;mero</label>
                        <input type="text" class="form-control" v-model="paciente.numero">
                    </div>
                    <div class="form-group">
                        <label>Complemento</label>
                        <input type="text" class="form-control" v-model="paciente.complemento">
                    </div>
                    <div class="form-group">
                        <label>Bairro</label>
                        <input type="text" class="form-control" v-model="paciente.bairro">
                    </div>                    
                    <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" class="form-control" v-model="paciente.cidade">
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <input type="text" class="form-control" v-model="paciente.estado">
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
                    .post('http://localhost:8000/api/pacientes/', this.paciente)
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