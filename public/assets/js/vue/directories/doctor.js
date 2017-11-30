// Vue.component('doctor-card', {
//     template: `
//     <div class="col-md-4 col-sm-6 col-xs-6">
//         <a href="#">
//             <div class="wrapper">
//                 <img src="/assets/icons/premium-listing.jpg" alt="">
//                 <div class="ribbon-wrapper-yellow" v-if="doctor.is_premium">
//                     <div class="ribbon-yellow">SUGGESTED</div>
//                 </div>
//             </div>
//             <div class="list-info">
//                 <p>
//                     <span>
//                         <strong class="full-name">{{ doctor.full_name }}</strong>
//                     </span>
//                     <span class="address ellipsis">
//                         {{ firstAddress }}
//                     </span>
//                     <!-- <span>19.6 miles away</span> -->
//                     <span class="contact">
//                         {{ firstPhone }}
//                     </span>
//                 </p>
//             </div>
//         </a>
//     </div>
//     `,

//     props: {
//         doctor: {
//             required: true,
//             type: Object
//         }
//     },

//     methods: {
        
//     },

//     computed: {

//         firstAddress: function() {
//             var address =  this.doctor.address[0];
//             if (address) {
//                 return address.street +', '+ address.city+', '+address.state+' '+address.zip;
//             }
//             return 'None';
//         },

//         firstPhone: function() {
//             var phone = this.doctor.phone[0];
//             return phone ? phone : 'None';
//         },
//     },
// });


// cath
Vue.component('doctor-card', {
    template: `
    <div class="col-md-4 col-sm-6 col-xs-6">
        <a href="#modal-doctor" data-toggle="modal" @click="setModal(doctor.provider_id)">
            <div class="wrapper">
                <img src="/assets/icons/premium-listing.jpg" alt="">
                <div class="ribbon-wrapper-yellow" v-if="doctor.is_subscribed">
                    <div class="ribbon-yellow">SUGGESTED</div>
                </div>
            </div>
            <div class="list-info">
                <p>
                    <span>
                        <strong class="full-name">{{ doctor.name }}</strong>
                    </span>
                    <span class="address ellipsis">
                        <!-- {{ doctor.full_address }} -->
                    </span>
                    <!-- <span>19.6 miles away</span> -->
                    <span class="contact">
                        {{ doctor.phone }}
                    </span>
                </p>
            </div>
        </a>
    </div>
    `,

    props: {
        doctor: {
            required: true,
            type: Object
        }
    },

    methods: {
        setModal(id) {
          $.get('/api/doctors/'+id).done(function(data) {
            $('[name="provider_id"]').val(data[0].provider_id);
            $('.name').text(data[0].name);
            $('.specialties').empty();
            $.each(data[0].specialties, function(i, v) {
              $('.specialties').append('<li>'+ v +'</li>');
            });

            $.each(data, function(i, v) {
              $('.address-row').empty();
              var template = $('.doctor-address-template:not(.used)').clone().addClass('used').show();
              // template.find('.address').text(v.full_address);
              template.find('.phone').text(v.phone);
              $('.address-row').append(template);
            });

          });
        },
    },

    computed: {

        firstAddress: function() {
            var address =  this.doctor.address[0];
            if (address) {
                return address.street +', '+ address.city+', '+address.state+' '+address.zip;
            }
            return 'None';
        },

        firstPhone: function() {
            var phone = this.doctor.phone[0];
            return phone ? phone : 'None';
        },
    },
});
// end cath
