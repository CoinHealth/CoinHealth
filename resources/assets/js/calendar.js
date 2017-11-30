var moment = require('moment');
const contact = new Vue({
    el: '#calendar',

    mounted () {

    },

    data: {
        cOptions: {
            defaultView: 'month',
            header: {
                left:   'month,basicDay',
                center: 'title',
                right:  'today prev,next'
            },
        },
        cEvents: [
            {
                title  : 'Event 1',
                start  : moment(),
            },
            {
                title  : 'Event 2',
                start  : moment(),
                end    : moment().add(7, 'd'),
            },
            {
                title  : 'Event 3',
                start  : moment().add(1, 'd'),
                allDay : moment().add(2, 'd'),
            },
        ],
    }
});
