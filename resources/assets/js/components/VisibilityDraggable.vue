<template>
   <div class="visibility-drag">
       <div class="col-md-6">
            <h4>Visible</h4>

            <draggable class="list-group min-height" :list="testimonialsVisibleNew" :options="{animation:200, group:'visbility'}" :element="'ul'" @add="onAdd($event, true)">
                <li class="list-group-item" v-for="(testimonial, index) in testimonialsVisibleNew" :key="testimonial.id" :data-id="testimonial.id">
                    <div><strong>{{ testimonial.name }}</strong></div>
                    <div>{{ testimonial.quote }}</div>
                </li>
            </draggable>


        </div> <!-- end col-md-6 -->
        <div class="col-md-6">
            <h4>Not Visible</h4>
            <draggable class="list-group min-height" :list="testimonialsNotVisibleNew" :options="{animation:200, group:'visbility'}" :element="'ul'" @add="onAdd($event, false)">

                <li class="list-group-item" v-for="(testimonial, index) in testimonialsNotVisibleNew" :key="testimonial.id" :data-id="testimonial.id">
                    <div><strong>{{ testimonial.name }}</strong></div>
                    <div>{{ testimonial.quote }}</div>
                </li>

            </draggable>
        </div> <!-- end col-md-6 -->
   </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },

        props: ['testimonialsVisible', 'testimonialsNotVisible'],

        data() {
            return {
                testimonialsVisibleNew: this.testimonialsVisible,
                testimonialsNotVisibleNew: this.testimonialsNotVisible
            }
        },

        methods: {
            onAdd(event, visible) {
                let id = event.item.getAttribute('data-id');
                axios.patch('/admin/testimonialsVisibility/' + id, {
                    visible: visible
                }).then((response) => {
                    // success message
                })
            }

        }
    }
</script>
