<script setup>
import { useForm } from '@inertiajs/vue3';
import { watch, defineProps, onMounted  } from 'vue';

import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Container from '@/OwnComponents/Container.vue';
import Card from '@/OwnComponents/Card.vue';
import BreadCroumbs from '@/OwnComponents/BreadCroumbs.vue';

const props = defineProps({
    edit: Boolean,
    user: Object
});

const form = useForm({
    name: props.user?.name || '',
    email: props.user?.email || '',
    password: ''
});

const breadcrumbs = [
    {
        label: "Usuarios",
        url: route('usuarios.index')
    },
    {
        label: `${props.edit ? 'Editar' : 'Crear'} Usuario`
    }
];

const saveUser = () => {

    props.edit 
    ? form.put(route('usuarios.update', {id: props.users.data.id}))
    : form.post(route('usuarios.store'));
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <BreadCroumbs :items="breadcrumbs"></BreadCroumbs>
        </template>

        <Container>
            <Card>
                <form @submit.prevent="saveUser">
                    <div class="mt-3">
                        <InputLabel for="name" value="Nombre" />
                        <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required
                            autocomplete="Nombre" />
                        <InputError :message="form.errors.name" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <InputLabel for="email" value="Email" />
                        <TextInput id="email" v-model="form.email" type="text" class="mt-1 block w-full" required
                            autocomplete="Email" />
                        <InputError :message="form.errors.email" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <InputLabel for="password" value="Contraseña" />
                        <TextInput id="password" v-model="form.password" type="text" class="mt-1 block w-full" required
                            autocomplete="Contraseña" />
                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                            Guardado.
                        </ActionMessage>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            <span v-if="edit">Actualizar</span>
                            <span v-else>Guardar</span>
                        </PrimaryButton>
                    </div>
                </form>
            </Card>
        </Container>

    </AppLayout>
</template>
