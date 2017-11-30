const contact = new Vue({
    el: '#contact',

    data: {
        contactData: [],
        dtColumns: [
            'full_name',
            'email',
            'status',
            'actions',
        ],
    },

    created () {
        var self = this;
        $.get('/api/contacts')
            .done((response) => self.contactData = response.data);
    }
});
