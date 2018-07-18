<template>
  <div>
    <form :action="action" method="POST" enctype="multipart/form-data">
      <input type="hidden" :value="token" name="_token"/>
      <input type="hidden" name="_method" value="PUT" v-if="is_edit"/>

      <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" :value="course.title" name="title">
        </div>
      </div>

      <div class="field">
        <label class="label">Subtitle</label>
        <div class="control">
          <input class="input" type="text" placeholder="Subtitle" :value="course.subtitle" name="subtitle">
        </div>
      </div>

      <div class="field">
        <label class="label">Content</label>
        <div class="control">
          <textarea :value="course.content" name="content" cols="30" rows="10" class="textarea" placeholder="Content" id="content-editor"></textarea>
        </div>
      </div>

      <div class="field">
        <label class="label">Duration</label>
        <div class="control">
          <input type="number" min="1" :value="course.duration" name="duration" class="input"/>
        </div>
      </div>

      <div class="field">
        <label class="label">Thumbnail Image</label>
        <div class="control">
          <input type="text" :value="course.thumb" name="thumb" class="input" placeholder="e.g: https://blabla.com"/>
        </div>
      </div>

      <div class="field">
        <label class="label">Attachment</label>
        <div class="control" style="margin-bottom: 0.7rem;">
          <input type="file" name="attachments[]" class="input" :accept="accept_files" />
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
    </form>
  </div>
</template>

<script>
import TinyMCE from 'tinymce';
import 'tinymce/themes/modern/theme.min.js';
import 'tinymce/skins/lightgray/skin.min.css';

export default {
  props: ['token', 'is_edit', 'action', 'course', 'storage_path'],

  mounted() {
    TinyMCE.init({
      selector: '#content-editor'
    });
  },

  data() {
    return {
      accept_files: 'image/*, application/*, video/*'
    }
  }
}
</script>

<style>

</style>
