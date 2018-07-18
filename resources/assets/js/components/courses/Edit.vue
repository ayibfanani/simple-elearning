<template>
  <div class="box">
    <course-form
      :course="course"
      :token="token"
      :action="`/courses/${course.id}/update`"
      :is_edit="true"
      :storage_path="storage_path"
    >
    </course-form>
  </div>
</template>

<script>
export default {
  props: ['token', 'encoded_course', 'storage_path'],

  data() {
    return {
      course: JSON.parse(this.encoded_course)
    }
  }
}
</script>

<style>

</style>
