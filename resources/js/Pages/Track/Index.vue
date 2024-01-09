<template>

    <MusicLayout>
        <template #title>
            Musique
        </template>

        <template #action>
            <Link
            :href="route('tracks.create')">
                Créer une Musique
            </Link>
        </template>

        <template #content>
            <div>
                <ul>
                    <li
                    v-for="(track, i) in tracks.slice().reverse()"
                    :key="track.uui">
                        <div>
                            <h4>
                                {{track.title}}
                            </h4>
                            <p>
                                {{track.artist}}
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
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
    props: {
        tracks: Array,
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