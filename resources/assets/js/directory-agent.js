import AgentCard from './components/Directories/Agents/Card.vue';
import ModalPreview from './components/Directories/Agents/ModalPreview.vue';
import ModalSave from './components/Directories/Agents/ModalSave.vue';
import ModalPremium from './components/Directories/Agents/ModalPremium.vue';
import Bus from './Bus.js';
// import Paginator from './helpers/Pagination.vue';

let Agent = new Vue({

    el:'#agent',

    components: {
        'agent-card': AgentCard,
        'modal-preview': ModalPreview,
        'modal-save': ModalSave,
        'modal-premium': ModalPremium,
        // 'paginator': Paginator,
        
    },

    data: {
        agents: [],
        pages: 0,
        page: 0, // zero based
        // user: {},
        role: 0,
        agent_id: 0,

        // search attribute
        searchInput: '',
        searchState: '',
        searchCity: '',
    },

    mounted () {
        this.preparePage();
    },

    methods: {
        preparePage () {
            let self = this;

            $.get('/directory/agents/api/getAgents').done(function(data) {
                // self.agents = data;
                // self.role = data.role;
                self.agents = data.agents;
                self.role = data.role;
                self.agent_id = data.agent_id;
            });

        },

        search() {
            // alert('search');
        },

        clear() {
            // alert('clear');
        },

        submit() {
            Bus.$emit('modal-premium', {
                agent_id: this.agent_id,
            });
        },
       
    },

    computed: {
        agentRole () {
            return this.role == 3;
        },
    },    


});
