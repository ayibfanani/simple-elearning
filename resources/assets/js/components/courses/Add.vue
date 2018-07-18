<template>
  <div class="box">
    <course-form
      :course="course"
      :token="token"
      action="/courses/add"
      :is_edit="false"
      storage_path=""
    ></course-form>
  </div>
</template>

<script>
export default {
  props: ['token', 'storage_path'],

  data() {
    return {
      course: {
        title: '',
        subtitle: '',
        content: '',
        thumb: '',
        attachments: []
      }
    }
  }
}
</script>

<style>

</style>
