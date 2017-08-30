<template>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quote</th>
                <th>Visible</th>
                <th>Order</th>
                <th>Sort</th>
            </tr>
        </thead>

        <draggable :list="testimonialsNew" :options="{animation:200, handle:'.my-handle'}" :element="'tbody'" @change="update">

            <tr v-for="(testimonial, index) in testimonialsNew">
                <td>
                    {{ testimonial.id }}
                    <a :href="'testimonials/' + testimonial.id + '/edit'" class="btn btn-primary btn-xs mb">Edit</a>
                    <form :action="'testimonials/' + testimonial.id" method="POST">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="_method" value="delete">

                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                    </form>

                </td>
                <td>{{ testimonial.name }}</td>
                <td>{{ testimonial.quote }}</td>
                <td>{{ testimonial.visible }}</td>
                <td>{{ testimonial.order }}</td>
                <td><i class="fa fa-arrows my-handle"></i></td>
            </tr>

        </draggable>

    </table>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },

        props: ['testimonials'],

        data() {
            return {
                testimonialsNew: this.testimonials,
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },

        methods: {
            update() {
                this.testimonialsNew.map((testimonial, index) => {
                    testimonial.order = index + 1;
                })

                axios.put('/admin/testimonials/updateAll', {
                    testimonials: this.testimonialsNew
                }).then((response) => {
                    // success message
                })
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
