import AllPacientes from './components/AllPacientes.vue';
import AddPaciente from './components/AddPaciente.vue';
import EditPaciente from './components/EditPaciente.vue';


export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllPacientes
    },
    {
        name: 'add',
        path: '/add',
        component: AddPaciente
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPaciente
    }
  ]