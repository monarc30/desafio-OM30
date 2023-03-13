<template>
    <div>
        <h3 class="text-center">Lista de Pacientes</h3><br/>
 
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nome da m&atilde;e</th>
                <th>Data de nascimento</th>
                <th>CPF</th>
                <th>CNS</th>
                <th>Foto</th>
                <th>Cep</th>
                <th>Endere&ccedil;o</th>
                <th>N&uacute;mero</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="paciente in pacientes" :key="paciente.id">
                <td>{{ paciente.id }}</td>
                <td>{{ paciente.nome }}</td>
                <td>{{ paciente.mae }}</td>
                <td>{{ paciente.data_nascimento }}</td>
                <td>{{ paciente.cpf }}</td>
                <td>{{ paciente.cns }}</td>
                <td>{{ paciente.file_path }}</td>
                <td>{{ paciente.cep }}</td>
                <td>{{ paciente.endereco }}</td>
                <td>{{ paciente.numero }}</td>
                <td>{{ paciente.complemento }}</td>
                <td>{{ paciente.bairro }}</td>
                <td>{{ paciente.cidade }}</td>
                <td>{{ paciente.estado }}</td>
                <td>{{ paciente.created_at }}</td>
                <td>{{ paciente.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: paciente.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletePaciente(paciente.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                pacientes: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/pacientes')
                .then(response => {                    
                    this.pacientes = response.data;
                });
        },
        methods: {
            deletePaciente(id) {
                this.axios
                    .delete(`http://localhost:8000/api/pacientes/${id}`)
                    .then(response => {
                        let i = this.pacientes.map(item => item.id).indexOf(id); // find index of your object
                        this.pacientes.splice(i, 1)
                    });
            }
        }
    }
</script>