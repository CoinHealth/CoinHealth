<template>
    <tr>
        <td data-th="Name">
            {{ subscriber.name }}
        </td>
        <td data-th="Contact">
            <span class="block">
                {{ subscriber.email }}
            </span>
        </td>
        <td data-th="Action">
            <a @click.prevent="process" href="javascript:void(0);" class="btn btn-xs btn-primary">
                <i class="fa fa-check" aria-hidden="true"></i>
            </a>

            <a @click.prevent="delete" href="javascript:void(0);" class="btn btn-xs btn-danger">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
</template>

<script>
    export default {

        props: {
            subscriber: {
                type: Object,
            }
        },

        mounted () {
            console.log(this.subscriber);
        },

        methods: {
            process () {
                console.log('processing',this.subscriber);
            },

            delete () {
                console.log('deleting',this.subscriber);
            }
        }
    }
</script>
