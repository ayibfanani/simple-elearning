<template>
  <div>
    <div class="field">
      <label class="label">Title</label>
      <div class="control">
        <input class="input" type="text" placeholder="Text input" name="title">
      </div>
    </div>

    <div class="field">
      <label class="label">Description</label>
      <div class="control">
        <textarea name="description" cols="30" rows="10" class="textarea" placeholder="Description"></textarea>
      </div>
    </div>

    <div class="field">
      <label class="label">Duration</label>
      <div class="control">
        <input type="time" name="duration" class="input"/>
      </div>
    </div>

    <div class="field">
      <label class="label">Thumbnail Image</label>
      <div class="control">
        <input type="text" name="thumb" class="input" placeholder="e.g: https://blabla.com"/>
      </div>
    </div>

    <div class="field">
      <label class="label">Attachment</label>
      <div class="control">
        <input type="file" name="attachment" class="input" />
      </div>
    </div>

    <div class="field is-grouped">
      <div class="control">
        <button class="button is-primary" v-if="is_edit">Update</button>
        <button class="button is-primary" v-else>Add</button>
      </div>
      <div class="control">
        <a href="/courses" class="button is-text">Cancel</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['is_edit']
}
</script>

<style>

</style>
