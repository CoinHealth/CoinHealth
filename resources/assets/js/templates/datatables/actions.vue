<template>
  <div class="dt-actions">
    <button class="btn btn-sm" @click="itemAction('view-item', rowData, rowIndex)">
        <i class="glyphicon glyphicon-zoom-in"></i>
    </button>
    <button class="btn btn-sm" @click="itemAction('edit-item', rowData, rowIndex)">
        <i class="glyphicon glyphicon-pencil"></i>
    </button>
    <button class="btn btn-sm" @click="itemAction('delete-item', rowData, rowIndex)">
        <i class="glyphicon glyphicon-trash"></i>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    rowData: {
      type: Object,
      required: true
    },
    rowIndex: {
      type: Number
    }
  },
  methods: {
    itemAction (action, data, index) {
      console.log('custom-actions: ' + action, data.name, index)
    }
  }
}
</script>
