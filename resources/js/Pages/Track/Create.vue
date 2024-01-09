<template>

    <MusicLayout>
        <template #title>
            Créer une musique
        </template>

        <template #action>
            <Link
            :href="route('tracks.index')">
                Retour
            </Link>
        </template>

        <template #content>
            <!-- <input type="text" v-model="test" name="test" id="test">
            Ma variable : {{ test }} -->
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Titre
                    </label>
                    <input
                        id="title"
                        v-model="form.title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.title}"
                        type="text"
                        placeholder="Title"
                    >
                    <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
                </div>
                <br>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Artiste
                    </label>
                    <input
                        id="artist"
                        v-model="form.artist"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.artist}"
                        type="text"
                        placeholder="Title"
                    >
                    <p class="text-red-500 text-xs italic">{{ form.errors.artist }}</p>
                </div>
                <br>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Image
                    </label>
                    <input
                        id="image"
                        @input="form.image = $event.target.files[0]"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.image}"
                        type="file"
                        placeholder="image"
                    >
                    <p class="text-red-500 text-xs italic">{{ form.errors.image }}</p>
                </div>
                <br>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Music
                    </label>
                    <input
                        id="music"
                        @input="form.music = $event.target.files[0]"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.music}"
                        type="file"
                        placeholder="music"
                    >
                    <p class="text-red-500 text-xs italic">{{ form.errors.music }}</p>
                </div>
                <br>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Display
                    </label>
                    <select
                        id="display"
                        v-model="form.display"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.display}"
                        type="booleanto"
                        placeholder="image"
                    >
                        <option :value="true">Oui</option>
                        <option :value="false">Non</option>
                    </select>
                    <p class="text-red-500 text-xs italic">{{ form.errors.display }}</p>
                </div>
                <br>
                <input type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                value="Crée une musique"
                >
            {{ form }}
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import {Link} from '@inertiajs/vue3'

export default{
    components: {
        MusicLayout,
        Link,
    },
    data(){
        return{
            // test: '',
            form: this.$inertia.form({
                title: '',
                artist: '',
                image: null,
                music: null,
                display: true,
            })
        }
    },
    methods: {
        submit(){
            console.log('submited')
            this.form.post(route('tracks.store'))
        }
    }
}
</script>



<style scoped>
    ul{
        list-style: none;
        padding: 0;
    }
    li{
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding: 10px;
    }
    li:hover{
        background: #8cc0eb;
        color: white;
        cursor: pointer;
    }
    h3{
        margin: 0;
    }
    p{
        margin: 0;
    }
</style>