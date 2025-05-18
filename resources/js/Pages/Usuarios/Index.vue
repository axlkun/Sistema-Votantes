<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import EditBtn from '@/OwnComponents/EditBtn.vue';
import DeleteBtn from '@/OwnComponents/DeleteBtn.vue';
import AppTable from '@/OwnComponents/Table.vue';
import Container from '@/OwnComponents/Container.vue';
import Card from '@/OwnComponents/Card.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import BreadCroumbs from '@/OwnComponents/BreadCroumbs.vue';

const props = defineProps({
    users: Object,
});

const headers = [
    { name: "Nombre" },
    { name: "Email" },
    { name: "Registro" },
    {
        name: "Actions",
        class: "text-right"
    }
];

const breadcrumbs = [
    {
        label: "Usuarios"
    }
];

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <BreadCroumbs :items="breadcrumbs"></BreadCroumbs>
        </template>

        <Container>

            <Link :href="route('usuarios.create')">
                <PrimaryButton>Nuevo usuario</PrimaryButton>
            </Link>

            <Card class="mt-4">
                <AppTable :headers="headers" :items="users">
                    <tr v-for="user in users.data" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.created_at }}</td>
                        <td>
                            <div class="flex items-center justify-end space-x-2">

                                <DeleteBtn 
                                     v-if="user.role !== 'admin'"
                                    :url="route('usuarios.destroy', { usuario: user.id })"
                                    module-name="user">
                                </DeleteBtn>
                            </div>
                        </td>
                    </tr>
                </AppTable>
            </Card>
        </Container>

    </AppLayout>
</template>
