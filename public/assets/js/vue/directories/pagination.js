Vue.component('pagination', {
    template: `
    <nav aria-label="Search results page" v-if="pages">
        <ul class="pagination">
            <li :class="current === 1 ? 'disabled' : '' ">
                <a href="#" aria-label="Previous" @click.prevent="changePage(current, '--')">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li v-for="page in pages" :class="current === page ? 'active': ''">
                <a href="#" @click.prevent="changePage(page)">
                    {{ page }}
                </a>
            </li>
            <li :class="current === pages ? 'disabled' : '' ">
                <a href="#" aria-label="Next" @click.prevent="changePage(current, '++')">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
    `,

    props: {
        pages: {
            default: 0,
            type: Number,
            required: true,
        },
        currentPage: {
            default: 1,
            type: Number,
            required: true,
        },
    },

    data: function() {
        return {
            current: this.currentPage+1,
            lDisabled: this.current == 1,
            rDisabled: this.current > 1 && this.current == this.pages,
        };
    },

    mounted: function() {

    },

    methods: {
        changePage: function(page, step = '') {
            if (step == '++' && this.current < this.pages) {
                page++;
            }
            else if (step == '--' && this.current > 1) {
                page--;
            }
            this.current = page;
            this.$emit('pagechange', this.current);
        },
    }
});
