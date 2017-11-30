<template>
    <paginate
        :page-count="20"
        :page-range="3"
        :margin-pages="2"
        :click-handler="pageChange"
        prev-text="Prev"
        next-text="Next"
        container-class="pagination pagination-sm"
        page-class="page-item">
    </paginate>
</template>
<script>
import Paginate from 'vuejs-paginate'
export default {
    components: {
        'paginate': Paginate
    },

    props: {

    },

    data () {
        return {

        }
    },

    methods: {
        pageChange (data) {
            console.log(data)
        },
    }
};
</script>
